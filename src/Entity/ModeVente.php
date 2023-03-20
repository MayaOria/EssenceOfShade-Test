<?php

namespace App\Entity;

use App\Repository\ModeVenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeVenteRepository::class)]
class ModeVente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'modeVente', targetEntity: Fleur::class, orphanRemoval: true)]
    private Collection $fleurs;

    public function __construct()
    {
        $this->fleurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Fleur>
     */
    public function getFleurs(): Collection
    {
        return $this->fleurs;
    }

    public function addFleur(Fleur $fleur): self
    {
        if (!$this->fleurs->contains($fleur)) {
            $this->fleurs->add($fleur);
            $fleur->setModeVente($this);
        }

        return $this;
    }

    public function removeFleur(Fleur $fleur): self
    {
        if ($this->fleurs->removeElement($fleur)) {
            // set the owning side to null (unless already changed)
            if ($fleur->getModeVente() === $this) {
                $fleur->setModeVente(null);
            }
        }

        return $this;
    }
}
