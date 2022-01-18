<?php

namespace App\Entity;

use App\Repository\AreaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=AreaRepository::class)
 * @method getUser()
 */
class Area
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $postalcode;

    /**
     * @ORM\Column(type="text")
     */
    private $decription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $age1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pmr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $restaurant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picnic;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $otheractivites;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $access;

    /**
     * @ORM\OneToOne(targetEntity=Gallery::class, inversedBy="area", cascade={"persist", "remove"})
     */
    private $gallery;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parking;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     * @Gedmo\Slug(fields={"name"} , updatable=false)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="area", orphanRemoval=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $age2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $age3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $age4;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalcode;
    }

    public function setPostalCode(int $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getDecription()
    {
        return $this->decription;
    }

    public function setDecription($decription): self
    {
        $this->decription = $decription;

        return $this;
    }

    public function getAge1(): ?string
    {
        return $this->age1;
    }

    public function setAge1(string $age1): self
    {
        $this->age1 = $age1;

        return $this;
    }

    public function getPmr(): ?string
    {
        return $this->pmr;
    }

    public function setPmr(?string $pmr): self
    {
        $this->pmr = $pmr;

        return $this;
    }

    public function getRestaurant(): ?string
    {
        return $this->restaurant;
    }

    public function setRestaurant(?string $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getPicnic(): ?string
    {
        return $this->picnic;
    }

    public function setPicnic(?string $picnic): self
    {
        $this->picnic = $picnic;

        return $this;
    }

    public function getOtherActivites(): ?string
    {
        return $this->otheractivites;
    }

    public function setOtherActivites(?string $otheractivites): self
    {
        $this->otheractivites = $otheractivites;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getAccess(): ?string
    {
        return $this->access;
    }

    public function setAccess(?string $access): self
    {
        $this->access = $access;

        return $this;
    }

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): self
    {
        $this->gallery = $gallery;

        return $this;
    }

    public function getParking(): ?string
    {
        return $this->parking;
    }

    public function setParking(?string $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

public function getVille(): ?string
{
    return $this->ville;
}

public function setVille(string $ville): self
{
    $this->ville = $ville;

    return $this;
}


public function getSlug(): ?string
{
    return $this->slug;
}

public function setSlug(string $slug): self
{
    $this->slug = $slug;

    return $this;
}

/**
 * @return Collection|Comment[]
 */
public function getComments(): Collection
{
    return $this->comments;
}

public function addComment(Comment $comment): self
{
    if (!$this->comments->contains($comment)) {
        $this->comments[] = $comment;
        $comment->setArea($this);
    }

    return $this;
}

public function removeComment(Comment $comment): self
{
    if ($this->comments->removeElement($comment)) {
        // set the owning side to null (unless already changed)
        if ($comment->getArea() === $this) {
            $comment->setArea(null);
        }
    }

    return $this;
}

public function getAge2(): ?string
{
    return $this->age2;
}

public function setAge2(string $age2): self
{
    $this->age2 = $age2;

    return $this;
}

public function getAge3(): ?string
{
    return $this->age3;
}

public function setAge3(string $age3): self
{
    $this->age3 = $age3;

    return $this;
}

public function getAge4(): ?string
{
    return $this->age4;
}

public function setAge4(string $age4): self
{
    $this->age4 = $age4;

    return $this;
}



}
