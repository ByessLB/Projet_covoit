<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $lundi = null;

    #[ORM\Column]
    private ?bool $mardi = null;

    #[ORM\Column]
    private ?bool $mercredi = null;

    #[ORM\Column]
    private ?bool $jeudi = null;

    #[ORM\Column]
    private ?bool $vendredi = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Trajet $trajet = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Personne $personne = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function isLundi(): ?bool
    {
        return $this->lundi;
    }

    public function setLundi(bool $lundi): static
    {
        $this->lundi = $lundi;

        return $this;
    }

    public function isMardi(): ?bool
    {
        return $this->mardi;
    }

    public function setMardi(bool $mardi): static
    {
        $this->mardi = $mardi;

        return $this;
    }

    public function isMercredi(): ?bool
    {
        return $this->mercredi;
    }

    public function setMercredi(bool $mercredi): static
    {
        $this->mercredi = $mercredi;

        return $this;
    }

    public function isJeudi(): ?bool
    {
        return $this->jeudi;
    }

    public function setJeudi(bool $jeudi): static
    {
        $this->jeudi = $jeudi;

        return $this;
    }

    public function isVendredi(): ?bool
    {
        return $this->vendredi;
    }

    public function setVendredi(bool $vendredi): static
    {
        $this->vendredi = $vendredi;

        return $this;
    }

    public function getTrajet(): ?Trajet
    {
        return $this->trajet;
    }

    public function setTrajet(?Trajet $trajet): static
    {
        $this->trajet = $trajet;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): static
    {
        $this->personne = $personne;

        return $this;
    }

}
