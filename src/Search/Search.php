<?php

namespace App\Search;

class Search
{
 private ?string $keyword = null;

    /**
     * @return string|null
     */
    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    /**
     * @param string|null $keyword
     */
    public function setKeyword(?string $keyword): void
    {
        $this->keyword = $keyword;
    }


}