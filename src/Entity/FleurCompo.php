<?php

namespace App\Entity;

use App\Repository\FleurCompoRepository;
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
}