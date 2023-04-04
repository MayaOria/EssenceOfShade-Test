<?php

namespace App\Entity;

use App\Entity\Evenement;
use App\Entity\Prestataire;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PrestaEvenementRepository;

#[ORM\Entity(repositoryClass: PrestaEvenementRepository::class)]
class PrestaEvenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'evenements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Prestataire $prestataire = null;

    #[ORM\ManyToOne(inversedBy: 'prestataires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Evenement $evenement = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrestataire(): ?Prestataire
    {
        return $this->prestataire;
    }

    public function setPrestataire(?Prestataire $prestataire): self
    {
        $this->prestataire = $prestataire;

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }

    public function __toString()
    {
        return $this->prestataire->getNomContact();
    }
}
