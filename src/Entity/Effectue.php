<?php

namespace App\Entity;

use App\Repository\EffectueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EffectueRepository::class)]
class Effectue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'effectues')]
    private ?Vehicule $vehicule = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Trajet $trajet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): static
    {
        $this->vehicule = $vehicule;

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
}
