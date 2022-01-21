<?php

namespace App\Search\SearchUser;


class SearchUser
{
    private ?string $name = null;
    private ?string $ville = null;
    private ?int $postalcode = null;
    private ?string  $baby;
    private ?string $mini;
    private ?string $child;
    private ?string $junior;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getVille(): ?string
    {
        return $this->ville;
    }

    /**
     * @param string|null $ville
     */
    public function setVille(?string $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return int|null
     */
    public function getPostalcode(): ?int
    {
        return $this->postalcode;
    }

    /**
     * @param int|null $postalcode
     */
    public function setPostalcode(?int $postalcode): void
    {
        $this->postalcode = $postalcode;
    }

    /**
     * @return string|null
     */
    public function getBaby(): ?string
    {
        return $this->baby;
    }

    /**
     * @param string|null $baby
     */
    public function setBaby(?string $baby): void
    {
        $this->baby = $baby;
    }

    /**
     * @return string|null
     */
    public function getMini(): ?string
    {
        return $this->mini;
    }

    /**
     * @param string|null $mini
     */
    public function setMini(?string $mini): void
    {
        $this->mini = $mini;
    }

    /**
     * @return string|null
     */
    public function getChild(): ?string
    {
        return $this->child;
    }

    /**
     * @param string|null $child
     */
    public function setChild(?string $child): void
    {
        $this->child = $child;
    }

    /**
     * @return string|null
     */
    public function getJunior(): ?string
    {
        return $this->junior;
    }

    /**
     * @param string|null $junior
     */
    public function setJunior(?string $junior): void
    {
        $this->junior = $junior;
    }





}