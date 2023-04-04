<?php

namespace App\Entity;

use App\Entity\SaisonFleur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SaisonRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: SaisonRepository::class)]
class Saison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $mois = null;

    #[ORM\OneToMany(mappedBy: 'saison', targetEntity: SaisonFleur::class)]
    private Collection $fleurs;

    public function __construct()
    {
        $this->fleurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * @return Collection<int, Fleur>
     */
    public function getFleurs(): Collection
    {
        return $this->fleurs;
    }

    public function addFleur(SaisonFleur $fleur): self
    {
        if (!$this->fleurs->contains($fleur)) {
            $this->fleurs->add($fleur);
        }

        return $this;
    }

    public function removeFleur(SaisonFleur $fleur): self
    {
        $this->fleurs->removeElement($fleur);

        return $this;
    }

    public function __toString()
    {
        return $this->mois;
    }
}
