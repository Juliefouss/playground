<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentAdminType;
use App\Repository\CommentFlagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
/**
* @Route ("/admin17", name="admin")
*/
    public function admin(): Response
    {
        return $this->render('pages/homeAdmin.html.twig');
    }

    /**
     * @Route ( "admin1704" , name="admin-home")
     */
    public function home(CommentFlagRepository $commentFlagRepository) {
        $flags = $commentFlagRepository->findBy(['handled' => false], ['date' => 'DESC']);
        $comments = new ArrayCollection();
        foreach ($flags as $flag) {
            if (!$comments->contains($flag->getComment())) {
                $comments->add($flag->getComment());
            }
        }
        return $this->render('pages/admin/homeAdmin.html.twig', ['commentsFlagged' => $comments]);
    }

    /**
     * @Route("admin1704/reported-comments/{id}", name="admin-homeReportedComment")
     */
    public function reportedComments(int $id, Comment $comment, EntityManagerInterface $em, Request $request){
        $form = $this->createForm(CommentAdminType::class, $comment);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em->persist($comment);
            $comment->getFlags()->forAll(fn($key, $flag) => $flag->setHandled(true));
            $em->flush();
            return $this->redirectToRoute('admin-home');

        }
        return $this->render('pages/admin/reported-comment.html.twig', ['comment'=>$comment, 'form'=>$form->createView()]);
    }

}