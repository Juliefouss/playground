<?php

namespace App\Search\admin;

use App\Search\Search;

class SearchAdmin extends Search
/* Il faut étendre l'entité search pour pouvoir récuperer certaines fonctionnalités*/
{
/* on va utiliser un keyword pour rechercher dans plusieurs lignes de la base de données avec un seul mot */
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