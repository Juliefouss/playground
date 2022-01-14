<?php

namespace App\Entity;

use App\Repository\GalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GalleryRepository::class)
 */
class Gallery
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Area::class, mappedBy="gallery", cascade={"persist", "remove"})
     */
    private $area;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="gallery", orphanRemoval=true)
     */
    private $photos;

    /**
     * @ORM\OneToOne(targetEntity=Proposal::class, mappedBy="gallery", cascade={"persist", "remove"})
     */
    private $proposal;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        // unset the owning side of the relation if necessary
        if ($area === null && $this->area !== null) {
            $this->area->setGallery(null);
        }

        // set the owning side of the relation if necessary
        if ($area !== null && $area->getGallery() !== $this) {
            $area->setGallery($this);
        }

        $this->area = $area;

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setGallery($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getGallery() === $this) {
                $photo->setGallery(null);
            }
        }

        return $this;
    }

    public function getProposal(): ?Proposal
    {
        return $this->proposal;
    }

    public function setProposal(?Proposal $proposal): self
    {
        // unset the owning side of the relation if necessary
        if ($proposal === null && $this->proposal !== null) {
            $this->proposal->setGallery(null);
        }

        // set the owning side of the relation if necessary
        if ($proposal !== null && $proposal->getGallery() !== $this) {
            $proposal->setGallery($this);
        }

        $this->proposal = $proposal;

        return $this;
    }
}
