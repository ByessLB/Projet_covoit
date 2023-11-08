<?php

namespace App\Entity;

use App\Repository\TrajetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrajetRepository::class)]
class Trajet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $numRueDepart = null;

    #[ORM\Column(length: 255)]
    private ?string $rueDepart = null;

    #[ORM\Column]
    private ?int $CPDepart = null;

    #[ORM\Column(length: 255)]
    private ?string $villeDepart = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $numRueArrivee = null;

    #[ORM\Column(length: 255)]
    private ?string $rueArrivee = null;

    #[ORM\Column]
    private ?int $CPArrivee = null;

    #[ORM\Column(length: 255)]
    private ?string $villeArrivee = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureAller = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureRetour = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Personne $personne = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumRueDepart(): ?int
    {
        return $this->numRueDepart;
    }

    public function setNumRueDepart(int $numRueDepart): static
    {
        $this->numRueDepart = $numRueDepart;

        return $this;
    }

    public function getRueDepart(): ?string
    {
        return $this->rueDepart;
    }

    public function setRueDepart(string $rueDepart): static
    {
        $this->rueDepart = $rueDepart;

        return $this;
    }

    public function getCPDepart(): ?int
    {
        return $this->CPDepart;
    }

    public function setCPDepart(int $CPDepart): static
    {
        $this->CPDepart = $CPDepart;

        return $this;
    }

    public function getVilleDepart(): ?string
    {
        return $this->villeDepart;
    }

    public function setVilleDepart(string $villeDepart): static
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    public function getNumRueArrivee(): ?int
    {
        return $this->numRueArrivee;
    }

    public function setNumRueArrivee(int $numRueArrivee): static
    {
        $this->numRueArrivee = $numRueArrivee;

        return $this;
    }

    public function getRueArrivee(): ?string
    {
        return $this->rueArrivee;
    }

    public function setRueArrivee(string $rueArrivee): static
    {
        $this->rueArrivee = $rueArrivee;

        return $this;
    }

    public function getCPArrivee(): ?int
    {
        return $this->CPArrivee;
    }

    public function setCPArrivee(int $CPArrivee): static
    {
        $this->CPArrivee = $CPArrivee;

        return $this;
    }

    public function getVilleArrivee(): ?string
    {
        return $this->villeArrivee;
    }

    public function setVilleArrivee(string $villeArrivee): static
    {
        $this->villeArrivee = $villeArrivee;

        return $this;
    }

    public function getHeureAller(): ?\DateTimeInterface
    {
        return $this->heureAller;
    }

    public function setHeureAller(\DateTimeInterface $heureAller): static
    {
        $this->heureAller = $heureAller;

        return $this;
    }

    public function getHeureRetour(): ?\DateTimeInterface
    {
        return $this->heureRetour;
    }

    public function setHeureRetour(\DateTimeInterface $heureRetour): static
    {
        $this->heureRetour = $heureRetour;

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
