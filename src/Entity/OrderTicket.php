<?php

namespace App\Entity;

use App\Repository\OrderTicketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderTicketRepository::class)
 */
class OrderTicket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Circus::class, inversedBy="orderTickets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $circus;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="orderTicket", orphanRemoval=true)
     */
    private $ticket;

    public function __construct()
    {
        $this->ticket = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCircus(): ?Circus
    {
        return $this->circus;
    }

    public function setCircus(?Circus $circus): self
    {
        $this->circus = $circus;

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTicket(): Collection
    {
        return $this->ticket;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->ticket->contains($ticket)) {
            $this->ticket[] = $ticket;
            $ticket->setOrderTicket($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->ticket->contains($ticket)) {
            $this->ticket->removeElement($ticket);
            // set the owning side to null (unless already changed)
            if ($ticket->getOrderTicket() === $this) {
                $ticket->setOrderTicket(null);
            }
        }

        return $this;
    }
}
