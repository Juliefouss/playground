<?php

namespace App\Entity;

use App\Repository\ProposalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProposalRepository::class)
 */
class Proposal
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $namearea;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressarea;

    /**
     * @ORM\Column(type="integer")
     */
    private $postalarea;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pmr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parking;

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
    private $access;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\OneToOne(targetEntity=Gallery::class, inversedBy="proposal", cascade={"persist", "remove"})
     */
    private $gallery;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getNamearea()
    {
        return $this->namearea;
    }

    /**
     * @param mixed $namearea
     */
    public function setNamearea($namearea): void
    {
        $this->namearea = $namearea;
    }

    /**
     * @return mixed
     */
    public function getAdressarea()
    {
        return $this->adressarea;
    }

    /**
     * @param mixed $adressarea
     */
    public function setAdressarea($adressarea): void
    {
        $this->adressarea = $adressarea;
    }

    /**
     * @return mixed
     */
    public function getPostalarea()
    {
        return $this->postalarea;
    }

    /**
     * @param mixed $postalarea
     */
    public function setPostalarea($postalarea): void
    {
        $this->postalarea = $postalarea;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
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
}
