<?php

namespace App\Entity;

use App\Repository\CircusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CircusRepository::class)
 */
class Circus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity=Artist::class, mappedBy="circus", orphanRemoval=true)
     */
    private $artist;

    /**
     * @ORM\OneToMany(targetEntity=OrderTicket::class, mappedBy="circus", orphanRemoval=true)
     */
    private $orderTickets;

    public function __construct()
    {
        $this->artist = new ArrayCollection();
        $this->orderTickets = new ArrayCollection();
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

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|Artist[]
     */
    public function getArtist(): Collection
    {
        return $this->artist;
    }

    public function addArtist(Artist $artist): self
    {
        if (!$this->artist->contains($artist)) {
            $this->artist[] = $artist;
            $artist->setCircus($this);
        }

        return $this;
    }

    public function removeArtist(Artist $artist): self
    {
        if ($this->artist->contains($artist)) {
            $this->artist->removeElement($artist);
            // set the owning side to null (unless already changed)
            if ($artist->getCircus() === $this) {
                $artist->setCircus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OrderTicket[]
     */
    public function getOrderTickets(): Collection
    {
        return $this->orderTickets;
    }

    public function addOrderTicket(OrderTicket $orderTicket): self
    {
        if (!$this->orderTickets->contains($orderTicket)) {
            $this->orderTickets[] = $orderTicket;
            $orderTicket->setCircus($this);
        }

        return $this;
    }

    public function removeOrderTicket(OrderTicket $orderTicket): self
    {
        if ($this->orderTickets->contains($orderTicket)) {
            $this->orderTickets->removeElement($orderTicket);
            // set the owning side to null (unless already changed)
            if ($orderTicket->getCircus() === $this) {
                $orderTicket->setCircus(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
