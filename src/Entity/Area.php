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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress): void
    {
        $this->adress = $adress;
    }

    /**
     * @return mixed
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * @param mixed $postalcode
     */
    public function setPostalcode($postalcode): void
    {
        $this->postalcode = $postalcode;
    }

    /**
     * @return mixed
     */
    public function getDecription()
    {
        return $this->decription;
    }

    /**
     * @param mixed $decription
     */
    public function setDecription($decription): void
    {
        $this->decription = $decription;
    }

    /**
     * @return mixed
     */
    public function getBaby()
    {
        return $this->baby;
    }

    /**
     * @param mixed $baby
     */
    public function setBaby($baby): void
    {
        $this->baby = $baby;
    }

    /**
     * @return mixed
     */
    public function getMini()
    {
        return $this->mini;
    }

    /**
     * @param mixed $mini
     */
    public function setMini($mini): void
    {
        $this->mini = $mini;
    }

    /**
     * @return mixed
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * @param mixed $child
     */
    public function setChild($child): void
    {
        $this->child = $child;
    }

    /**
     * @return mixed
     */
    public function getJunior()
    {
        return $this->junior;
    }

    /**
     * @param mixed $junior
     */
    public function setJunior($junior): void
    {
        $this->junior = $junior;
    }

    /**
     * @return mixed
     */
    public function getPmr()
    {
        return $this->pmr;
    }

    /**
     * @param mixed $pmr
     */
    public function setPmr($pmr): void
    {
        $this->pmr = $pmr;
    }

    /**
     * @return mixed
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * @param mixed $restaurant
     */
    public function setRestaurant($restaurant): void
    {
        $this->restaurant = $restaurant;
    }

    /**
     * @return mixed
     */
    public function getPicnic()
    {
        return $this->picnic;
    }

    /**
     * @param mixed $picnic
     */
    public function setPicnic($picnic): void
    {
        $this->picnic = $picnic;
    }

    /**
     * @return mixed
     */
    public function getOtheractivites()
    {
        return $this->otheractivites;
    }

    /**
     * @param mixed $otheractivites
     */
    public function setOtheractivites($otheractivites): void
    {
        $this->otheractivites = $otheractivites;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param mixed $website
     */
    public function setWebsite($website): void
    {
        $this->website = $website;
    }

    /**
     * @return mixed
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param mixed $access
     */
    public function setAccess($access): void
    {
        $this->access = $access;
    }

    /**
     * @return mixed
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param mixed $gallery
     */
    public function setGallery($gallery): void
    {
        $this->gallery = $gallery;
    }

    /**
     * @return mixed
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * @param mixed $parking
     */
    public function setParking($parking): void
    {
        $this->parking = $parking;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments): void
    {
        $this->comments = $comments;
    }

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
    private $baby;
    /**
     * @ORM\Column(type="string", length=255)
     */

    private $mini;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $child;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $junior;



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





}
