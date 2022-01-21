<?php

namespace App\Controller;

use App\Entity\Area;
use App\Entity\Comment;
use App\Form\AreaType;
use App\Form\CommentType;
use App\Repository\AreaRepository;
use App\Service\PhotoUploader;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AreaController extends AbstractController
{


    /**
     *@Route ( "/viewArea" , name="viewArea")
     */

    public function area(AreaRepository $areaRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $areas = $areaRepository->findAll();
        $areas = $paginator->paginate(
            $areas,
            $request->query->getInt('page', 1),
            1);
        return $this->render('pages/viewArea.html.twig', ['areas'=>$areas]);
    }


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
            return $this->redirectToRoute ('view_area', ['slug'=>$area->getSlug()]);
        }
        return $this ->render ('pages/admin/create-new-a.html.twig', ['areaForm' => $form->createView()]);
    }

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


}