<?php

namespace App\Controller;

use App\Entity\Area;
use App\Entity\Comment;
use App\Entity\Dislike;
use App\Entity\Like;
use App\Form\AreaType;
use App\Form\CommentType;
use App\Repository\AreaRepository;
use App\Repository\DislikeRepository;
use App\Repository\LikeRepository;
use App\Service\PhotoUploader;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AreaController extends AbstractController
{
/* Route pour trouver les aires de jeux parmis toutes les aires de jeux*/
    /**
     *@Route ( "/viewArea" , name="viewArea")
     */

    public function area(AreaRepository $areaRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $areas = $areaRepository->findAll();
        $areas = $paginator->paginate(
            $areas,
            $request->query->getInt('page', 1),
            2);
        return $this->render('pages/viewArea.html.twig', ['areas'=>$areas]);
    }

/* Route pour trouver les aires de jeux via le slug et permettre de créer des commentaires*/
    /**
     * @Route("/a/{slug}", name="view_area")
     */
    public function view (string $slug, AreaRepository $areaRepository,EntityManagerInterface $em, Request $request): Response
    {
        $area = $areaRepository->findOneBySlug($slug);
        if ($area === null) {
            throw new NotFoundHttpException("aire de jeux inexistante");
        }
        $comment= new Comment();
        $comment ->setArea($area);
        $commentForm = $this->createForm(CommentType::class, $comment);
        $commentForm->handleRequest($request);
        if ($commentForm ->isSubmitted()&& $commentForm->isValid()){
            $em->persist($comment);
            $em->flush();
            return $this->redirectToRoute('view_area', ['slug' => $area->getSlug()]);
        }

        return $this-> render('pages/area.html.twig', ['area'=>$area,'commentForm'=>$commentForm->createView()]);
    }

    /* Route pour que l'admin puisse créer une nouvelles aires de jeux*/
    /**
     * @Route ("/create-new-a" , name="create-new-a")
     */

    public function createA(Request $request, PhotoUploader $photoUploader,EntityManagerInterface $em): Response
    {
        $area = new Area();
        $form= $this->createForm(AreaType::class, $area);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            foreach ($form->get('gallery')->get('photos')as $photoData){
                $photo=$photoUploader->uploadPhoto(($photoData));
                $area->getGallery()->addPhoto($photo);
                $em->persist($photo);
            }
            $em->persist($area->getGallery());
            $em->persist($area);
            $em->flush();
            return $this->redirectToRoute ('admin-area');
        }
        return $this ->render ('pages/admin/create-new-a.html.twig', ['areaForm' => $form->createView()]);
    }

/* Route pour que l'Admin puisse modifier une aire de jeux existante*/
    /**
     * @Route("/edit-a/{id<\d+>}", name="edit-a")
     */
    public function editA(int $id, PhotoUploader $photoUploader, Request $request, AreaRepository $areaRepository, EntityManagerInterface $em): Response
    {
        $area = $areaRepository->find($id);
        $form = $this->createForm(AreaType::class, $area);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($form->get('gallery')->get('photos') as $photoData) {
                $photo = $photoUploader->uploadPhoto($photoData);
                if($photo != null) {
                    $photo->setGallery($area->getGallery());
                    $em->persist($photo);
                }
            }
            $em->persist($area->getGallery());
            $em->persist($area);
            $em->flush();
            return $this->redirectToRoute('view_area', ['slug' => $area->getSlug()]);
        }
        return $this->render('pages/admin/create-new-a.html.twig', ['areaForm' => $form->createView()]);

    }

    /*Route pour pouvoir supprimer une aire de jeux existante*/
    /**
     * @Route ("delete-a/{id<\d+>}", name="delete_a")
     */

    public function delete( int $id, AreaRepository $areaRepository,EntityManagerInterface $em) : Response{
        $area = $areaRepository->findById($id);
        $em->remove($area);
        $em->flush();
        return $this->redirectToRoute('admin-home');
    }

/* Route pour que l'utilisateur connecté puisse liker ou ne plus liker une aire de jeux*/
    /**
     * @Route("/like/area/{id}", name="area-like")
     */
    public function like( Area $area, EntityManagerInterface $entityManager, LikeRepository $likeRepository): Response
    {
        $user = $this->getUser();

        // on vérifie si le user n'est pas connecté et on renvoie une 403 en json
        if (!$user) {
            return $this->json([
                'code' => 403,
                'message' => 'error, il faut se connecter'
            ], 403);
        }

        // on vérifie si le user a déjà liké la plaine de jeux , on retire alors le like, renvoie le nombre de likes et une 200 en json
        if ($area->isLikedByUser($user)) {
            $like = $likeRepository->findOneBy([
                'area' => $area,
                'user' => $user,
            ]);

            $entityManager->remove($like);
            $entityManager->flush();

            return $this->json([
                'code' => 200,
                'message' => 'delete',
                'likes' => $likeRepository->count(['area' => $area])
            ], 200);
        }

        // on crée un like, on renvoie le nombre de likes et une 200 en json
        $like = new Like();
        $like->setArea($area);
        $like->setUser($user);

        $entityManager->persist($like);
        $entityManager->flush();

        return $this->json([
            'code' => 200,
            'message' => 'add',
            'likes' => $likeRepository->count(['area' => $area])
        ], 200);
    }

 /* Route pour que l'utilisateur puisse 'disliker' une aire de jeux ou enlever le dislike*/
    /**
     * @Route("/dislike/area/{id}", name="area-dislike")
     */
    public function dislike( Area $area, EntityManagerInterface $entityManager, DislikeRepository $dislikeRepository): Response
    {
        $user = $this->getUser();

        // on vérifie si le user n'est pas connecté et on renvoie une 403 en json
        if (!$user) {
            return $this->json([
                'code' => 403,
                'message' => 'error, il faut se connecter'
            ], 403);
        }

        // on vérifie si le user a déjà liké la plaine de jeux , on retire alors le like, renvoie le nombre de likes et une 200 en json
        if ($area->isDislikedByUser($user)) {
            $dislike = $dislikeRepository->findOneBy([
                'area' => $area,
                'user' => $user,
            ]);

            $entityManager->remove($dislike);
            $entityManager->flush();

            return $this->json([
                'code' => 200,
                'message' => 'delete',
                'dislikes' => $dislikeRepository->count(['area' => $area])
            ], 200);
        }

        // on crée un like, on renvoie le nombre de likes et une 200 en json
        $dislike = new Dislike();
        $dislike->setArea($area);
        $dislike->setUser($user);

        $entityManager->persist($dislike);
        $entityManager->flush();

        return $this->json([
            'code' => 200,
            'message' => 'add',
            'dislikes' => $dislikeRepository->count(['area' => $area])
        ], 200);
    }


}