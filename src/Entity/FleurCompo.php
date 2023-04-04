<?php

namespace App\Entity;

use App\Repository\FleurCompoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FleurCompoRepository::class)]
class FleurCompo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'fleursCompo')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Composition $composition = null;

    #[ORM\ManyToOne(inversedBy: 'fleursCompo')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fleur $fleur = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbPack = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getComposition(): ?Composition
    {
        return $this->composition;
    }

    public function setComposition(?Composition $composition): self
    {
        $this->composition = $composition;

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

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNbPack(): ?int
    {
        return $this->nbPack;
    }

    public function setNbPack(?int $nbPack): self
    {
        $this->nbPack = $nbPack;

        return $this;
    }

    public function __toString()
    {
        return $this->fleur->getNom();
    }
}

