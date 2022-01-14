<?php

namespace App\Search;

use App\Search\SearchType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Routing\RouterInterface;

class SearchFormGenerator
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


    public function getSearchForm(): FormView {
        $form = $this->formFactory->create(SearchType::class, null, ["action"=>$this->router->generate('search')]);
        return $form->createView();
    }


}