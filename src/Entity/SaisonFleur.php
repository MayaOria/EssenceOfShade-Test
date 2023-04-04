<?php

namespace App\Entity;

use App\Repository\SaisonFleurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaisonFleurRepository::class)]
class SaisonFleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'fleurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Saison $saison = null;

    #[ORM\ManyToOne(inversedBy: 'saisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fleur $fleur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaison(): ?Saison
    {
        return $this->saison;
    }

    public function setSaison(?Saison $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    public function getFleur(): ?Fleur
    {
        return $this->fleur;
    }

    public function setFleur(?Fleur $fleur): self
    {
        $this->fleur = $fleur;

        return $this;
    }

    public function __toString()
    {
        return $this->saison->getMois();
    }
}
