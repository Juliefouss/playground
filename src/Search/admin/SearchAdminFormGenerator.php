<?php

namespace App\Search\admin;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Routing\RouterInterface;

class SearchAdminFormGenerator
{
    private FormFactoryInterface $formFactory;
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

    public function getSearchAdminForm():FormView {
        $form = $this->formFactory->create(SearchAdminType::class, null, ["action"=>$this->router->generate('search-Admin')]);
        return $form->createView();
    }
}