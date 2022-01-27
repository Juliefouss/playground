<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\AreaRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=AreaRepository::Class)
 */
class Area
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
    private  $comments;

    /**
     * @ORM\OneToMany(targetEntity=Like::class, mappedBy="area")
     */
    private $likes;

    /**
     * @ORM\OneToMany(targetEntity=Dislike::class, mappedBy="area")
     */
    private $dislikes;

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

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->dislikes = new ArrayCollection();
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


/**
 * @return Collection|Like[]
 */
public function getLikes(): Collection
{
    return $this->likes;
}

public function addLike(Like $like): self
{
    if (!$this->likes->contains($like)) {
        $this->likes[] = $like;
        $like->setArea($this);
    }

    return $this;

}


    /**
     * Permet de savoir si une plaine de jeux a été liké par un utilisateur
     * @param User $user
     * @return bool
     */


    public function isLikedByUser(User $user): bool {
        foreach ($this->likes as $like){
            if($like->getUser() === $user){
                return true;
            }
        }
        return false;
    }


public function removeLike(Like $like): self
{
    if ($this->likes->removeElement($like)) {
        // set the owning side to null (unless already changed)
        if ($like->getArea() === $this) {
            $like->setArea(null);
        }
    }

    return $this;
}
        /**
         * @return Collection|Dislike[]
         */
        public function getDislikes(): Collection
        {
            return $this->dislikes;
        }

        public function addDislike(Dislike $dislike): self
        {
            if (!$this->dislikes->contains($dislike)) {
                $this->dislikes[] = $dislike;
                $dislike->setArea($this);
            }

            return $this;
        }

        public function removeDislike(Dislike $dislike): self
        {
            if ($this->dislikes->removeElement($dislike)) {
                // set the owning side to null (unless already changed)
                if ($dislike->getArea() === $this) {
                    $dislike->setArea(null);
                }
            }

            return $this;
        }

    /**
     * Permet de savoir si une plaine de jeux a été disliké par un utilisateur
     * @param User $user
     * @return bool
     */

    public function isDislikedByUser(User $user): bool {
        foreach ($this->dislikes as $dislike){
            if($dislike->getUser() === $user){
                return true;
            }
        }
        return false;
    }


}
