<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentAdminType;
use App\Repository\AreaRepository;
use App\Repository\CommentFlagRepository;
use App\Repository\ContactRepository;
use App\Repository\ProposalRepository;
use App\Search\admin\SearchAdmin;
use App\Search\admin\SearchAdminType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
     *@Route ( "/adminArea" , name="admin-area")
     */

    public function adminArea(AreaRepository $areaRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $areas = $areaRepository->findAll();
        $areas = $paginator->paginate(
            $areas,
            $request->query->getInt('page', 1),
            1);
        return $this->render('pages/admin/admin-area.html.twig', ['areas'=>$areas]);
    }

    /**
     * @Route ("adminMessage", name="admin-message")
     */

    public function contacts(ContactRepository $contactRepository,PaginatorInterface $paginator, Request $request):Response{
        $contacts= $contactRepository->findAll();
        $contacts=$paginator->paginate(
            $contacts,
            $request->query->getInt('pages', 1),5
        );
        return $this->render('pages/admin/adminMessage.html.twig', ['contacts'=>$contacts]);
    }

    /**
     * @Route ("adminProposal" , name="admin-proposal")
     */

    public function proposals (ProposalRepository $proposalRepository, PaginatorInterface $paginator, Request $request):Response{
        $proposals = $proposalRepository->findAll();
        $proposals = $paginator->paginate(
            $proposals,
            $request->query->getInt('pages', 1),1
        );
        return $this->render('pages/admin/adminProposal.html.twig', ['proposals'=>$proposals]);
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


    /**
     * @Route ("searchAdmin", name="search-Admin")
     */

    public function searchAdmin( Request $request, AreaRepository $areaRepository): Response{
        $searchAdmin = new SearchAdmin();
        $form =$this->createForm(SearchAdminType::class, $searchAdmin);
        $form->handleRequest($request);
        $result=[];
        if ($form->isSubmitted() && $form->isValid()){
            $result = $areaRepository->findBySearch($searchAdmin);
        }
        return $this->render('pages/admin/searchAdmin.html.twig', ['areas'=>$result]);

    }

}