<?php
namespace App\Search\SearchUser;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Routing\RouterInterface;

class SearchUserFormGenerator
{

    private FormFactoryInterface  $formFactory;
    private RouterInterface $router;

    /**
     * @param FormFactoryInterface $formFactory
     * @param RouterInterface $router
     */
    public function __construct(FormFactoryInterface $formFactory, RouterInterface $router)
    {
        $this->formFactory = $formFactory;
        $this->router = $router;
    }

    public function getSearchUserForm (): FormView{
        $form = $this->formFactory->create(SearchUserType::class, null, ["action"=>$this->router->generate('searchEngine')]);
        return $form->createView();
    }

}