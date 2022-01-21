<?php

namespace App\Twig;

use App\Search\admin\SearchAdminFormGenerator;
use App\Search\SearchFormGenerator;
use App\Search\SearchUser\SearchUserFormGenerator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class MyTwigExtension extends AbstractExtension
{

    private SearchFormGenerator $searchFormGenerator;
    private SearchAdminFormGenerator $searchAdminFormGenerator;
    private SearchUserFormGenerator $searchUserFormGenerator;

    /**
     * @param SearchFormGenerator $searchFormGenerator
     * @param SearchAdminFormGenerator $searchAdminFormGenerator
     * @param SearchUserFormGenerator $searchUserFormGenerator
     */
    public function __construct(SearchFormGenerator $searchFormGenerator, SearchAdminFormGenerator $searchAdminFormGenerator, SearchUserFormGenerator $searchUserFormGenerator)
    {
        $this->searchFormGenerator = $searchFormGenerator;
        $this->searchAdminFormGenerator = $searchAdminFormGenerator;
        $this->searchUserFormGenerator = $searchUserFormGenerator;
    }


    public function getFunctions(): array
    {
        return [
            new TwigFunction('getSearchForm', [$this->searchFormGenerator,'getSearchForm']),
            new TwigFunction('getSearchAdminForm', [$this->searchAdminFormGenerator, 'getSearchAdminForm']),
            new TwigFunction('getSearchUserForm',[$this->searchUserFormGenerator, 'getSearchUserForm'])
        ];
    }


}