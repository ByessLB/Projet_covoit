<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $nbPlace = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $validiteAssurance = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $validiteControleTech = null;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Effectue::class)]
    private Collection $effectues;

    public function __construct()
    {
        $this->effectues = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getNbPlace(): ?int
    {
        return $this->nbPlace;
    }

    public function setNbPlace(int $nbPlace): static
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    public function getValiditeAssurance(): ?\DateTimeInterface
    {
        return $this->validiteAssurance;
    }

    public function setValiditeAssurance(\DateTimeInterface $validiteAssurance): static
    {
        $this->validiteAssurance = $validiteAssurance;

        return $this;
    }

    public function getValiditeControleTech(): ?\DateTimeInterface
    {
        return $this->validiteControleTech;
    }

    public function setValiditeControleTech(\DateTimeInterface $validiteControleTech): static
    {
        $this->validiteControleTech = $validiteControleTech;

        return $this;
    }

    /**
     * @return Collection<int, Effectue>
     */
    public function getEffectues(): Collection
    {
        return $this->effectues;
    }

    public function addEffectue(Effectue $effectue): static
    {
        if (!$this->effectues->contains($effectue)) {
            $this->effectues->add($effectue);
            $effectue->setVehicule($this);
        }

        return $this;
    }

    public function removeEffectue(Effectue $effectue): static
    {
        if ($this->effectues->removeElement($effectue)) {
            // set the owning side to null (unless already changed)
            if ($effectue->getVehicule() === $this) {
                $effectue->setVehicule(null);
            }
        }

        return $this;
    }

}
