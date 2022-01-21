<?php

namespace App\Search\admin;

use App\Search\Search;

class SearchAdmin extends Search
{

    private string $keyword;

    /**
     * @return string
     */
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     */
    public function setKeyword(string $keyword): void
    {
        $this->keyword = $keyword;
    }


}