<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $evenement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDevis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $document = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $remarques = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenement(): ?string
    {
        return $this->evenement;
    }

    public function setEvenement(string $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }

    public function getDateDevis(): ?\DateTimeInterface
    {
        return $this->dateDevis;
    }

    public function setDateDevis(\DateTimeInterface $dateDevis): self
    {
        $this->dateDevis = $dateDevis;

        return $this;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(?string $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getRemarques(): ?string
    {
        return $this->remarques;
    }

    public function setRemarques(?string $remarques): self
    {
        $this->remarques = $remarques;

        return $this;
    }

    public function telechargerDevis(): BinaryFileResponse
{
    // send the file contents and force the browser to download it
    $file = new File('/public/upload/image/devis/'.$this->getDocument());

    $path = $this->getDocument();

    // display the file contents in the browser instead of downloading it
    return $file($path, ResponseHeaderBag::DISPOSITION_INLINE);
}
}
