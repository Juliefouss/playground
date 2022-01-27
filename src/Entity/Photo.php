<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhotoRepository::class)
 */
class Photo
    /* Toutes les données ci-dessous sont créer à partir du terminal et mapper avec la base de données ensuite il faut générer les setter et getter*/

{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity=gallery::class, inversedBy="photos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gallery;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getGallery(): ?gallery
    {
        return $this->gallery;
    }

    public function setGallery(?gallery $gallery): self
    {
        $this->gallery = $gallery;

        return $this;
    }
}
