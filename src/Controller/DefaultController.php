<?php

namespace App\Controller;
use App\Entity\Area;
use App\Entity\Comment;
use App\Entity\CommentFlag;
use App\Entity\Contact;
use App\Entity\Proposal;
use App\Form\AreaType;
use App\Form\CommentType;
use App\Form\ContactType;
use App\Form\ProposalType;
use App\Repository\AreaRepository;
use App\Search\Search;
use App\Search\SearchType;
use App\Service\PhotoUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     */

    public function home(): Response
    {
        return $this->render('pages/home.html.twig');
    }


    /**
     * @Route ("/search", name="search")
     */
    public function search( Request $request, AreaRepository $areaRepository): Response
    {
       $search = new Search();
       $form = $this->createForm(SearchType::class, $search);
       $form->handleRequest($request);
        $result = [];
       if($form->isSubmitted() && $form->isValid()){
           $result = $areaRepository->findBySearch($search);

       } return $this->render('pages/search.html.twig', ['areas'=> $result]);
    }


    /**
     * @Route ("/proposal", name="proposal")
     */

    public function proposal (Request $request,PhotoUploader $photoUploader,EntityManagerInterface $em): Response
    {
        $proposal = new Proposal();
        $form = $this->createForm(ProposalType::class, $proposal);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($form->get('gallery')->get('photos')as $photoData){
                $photo =$photoUploader->uploadPhoto($photoData);
                $proposal->getGallery()->addPhoto($photo);
                $em->persist($photo);
            }
            $em->persist($proposal->getGallery());
            $em->persist($proposal);
            $em->flush();
            return new Response('Votre formulaire a bien été envoyé');
        }
        return $this->render('pages/proposal.html.twig', ['proposalForm' => $form->createView()]);
    }

    /**
     * @Route ("/contact", name="contact")
     */

    public function contact(Request $request, EntityManagerInterface $em): Response
    {
        $contact= new Contact();
        $form=$this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
            $em->persist($contact);
            $em->flush();
            return $this->render ('pages/thanks.html.twig');

        }
        return $this->render('pages/contact.html.twig', ['contactForm'=>$form->createView()]);
    }

    /**
     * @Route ("/report-comment/{id}", name="reportComment", methods={"GET"})
     */

    public  function reportComment(Comment $comment, EntityManagerInterface $em){
        $flag=new CommentFlag();
        $flag->setComment($comment);
        $em->persist($flag);
        $em->flush();
        return $this->render('elements/flag-response.html.twig');

    }
}

