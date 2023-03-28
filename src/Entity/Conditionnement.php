<?php

namespace App\Entity;

use App\Repository\ConditionnementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConditionnementRepository::class)]
class Conditionnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $nombre = null;

    #[ORM\OneToMany(mappedBy: 'conditionnement', targetEntity: Fleur::class, orphanRemoval: true)]
    private Collection $fleurs;

    public function __construct()
    {
        $this->fleurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(int $nombre): self
    {
        $this->nombre = $nombre;

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
            $fleur->setConditionnement($this);
        }

        return $this;
    }

    public function removeFleur(Fleur $fleur): self
    {
        if ($this->fleurs->removeElement($fleur)) {
            // set the owning side to null (unless already changed)
            if ($fleur->getConditionnement() === $this) {
                $fleur->setConditionnement(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
