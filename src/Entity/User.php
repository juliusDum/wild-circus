<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=OrderTicket::class, mappedBy="user", orphanRemoval=true)
     */
    private $orderTickets;

    public function __construct()
    {
        $this->orderTickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

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
            $orderTicket->setUser($this);
        }

        return $this;
    }

    public function removeOrderTicket(OrderTicket $orderTicket): self
    {
        if ($this->orderTickets->contains($orderTicket)) {
            $this->orderTickets->removeElement($orderTicket);
            // set the owning side to null (unless already changed)
            if ($orderTicket->getUser() === $this) {
                $orderTicket->setUser(null);
            }
        }

        return $this;
    }
}
