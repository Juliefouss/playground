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
    private $age1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getNameArea(): ?string
    {
        return $this->namearea;
    }

    public function setNameArea(string $name_area): self
    {
        $this->namearea = $name_area;

        return $this;
    }

    public function getAdressArea(): ?string
    {
        return $this->adressarea;
    }

    public function setAdressArea(string $adressarea): self
    {
        $this->adressarea = $adressarea;

        return $this;
    }

    public function getPostalArea(): ?int
    {
        return $this->postalarea;
    }

    public function setPostalArea(int $postalarea): self
    {
        $this->postalarea = $postalarea;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getParking(): ?string
    {
        return $this->parking;
    }

    public function setParking(?string $parking): self
    {
        $this->parking = $parking;

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

    public function getAccess(): ?string
    {
        return $this->access;
    }

    public function setAccess(?string $access): self
    {
        $this->access = $access;

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

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): self
    {
        $this->gallery = $gallery;

        return $this;
    }

    public function getAge1(): ?string
    {
        return $this->age1;
    }

    public function setAge1(?string $age1): self
    {
        $this->age1 = $age1;

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
