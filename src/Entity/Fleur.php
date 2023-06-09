<?php

namespace App\Entity;

use App\Entity\SaisonFleur;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use App\Repository\FleurRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


#[ORM\Entity(repositoryClass: FleurRepository::class)]
class Fleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::FLOAT)]
    private ?float $prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $remarques = null;

    #[ORM\ManyToOne(inversedBy: 'fleurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CouleurFleur $couleurFleur = null;

    #[ORM\ManyToOne(inversedBy: 'fleurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ModeVente $modeVente = null;

    #[ORM\ManyToOne(inversedBy: 'fleurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Conditionnement $conditionnement = null;

    #[ORM\OneToMany(mappedBy:'fleur', targetEntity: SaisonFleur::class, cascade:['persist', 'remove'])]
    private Collection $saisons;

    #[ORM\ManyToOne(inversedBy: 'fleurs')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'fleur', targetEntity: FleurCompo::class)]
    private Collection $fleursCompo;

    public function __construct()
    {
        $this->saisons = new ArrayCollection();
        $this->fleursCompo = new ArrayCollection();
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

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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

    public function getCouleurFleur(): ?CouleurFleur
    {
        return $this->couleurFleur;
    }

    public function setCouleurFleur(?CouleurFleur $couleurFleur): self
    {
        $this->couleurFleur = $couleurFleur;

        return $this;
    }

    public function getModeVente(): ?ModeVente
    {
        return $this->modeVente;
    }

    public function setModeVente(?ModeVente $modeVente): self
    {
        $this->modeVente = $modeVente;

        return $this;
    }

    public function getConditionnement(): ?Conditionnement
    {
        return $this->conditionnement;
    }

    public function setConditionnement(?Conditionnement $conditionnement): self
    {
        $this->conditionnement = $conditionnement;

        return $this;
    }

    /**
     * @return Collection<int, Saison>
     */
    public function getSaisons(): Collection
    {
        return $this->saisons;
    }

    public function addSaison(SaisonFleur $saison): self
    {
        if (!$this->saisons->contains($saison)) {
            $this->saisons->add($saison);
            $saison->setFleur($this);
        }

        return $this;
    }

    public function removeSaison(SaisonFleur $saison): self
    {
        if ($this->saisons->removeElement($saison)) {
            if ($saison->getFleur() === $this) {
                $saison->setFleur(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, FleurCompo>
     */
    public function getFleursCompo(): Collection
    {
        return $this->fleursCompo;
    }

    public function addFleursCompo(FleurCompo $fleursCompo): self
    {
        if (!$this->fleursCompo->contains($fleursCompo)) {
            $this->fleursCompo->add($fleursCompo);
            $fleursCompo->setFleur($this);
        }

        return $this;
    }

    public function removeFleursCompo(FleurCompo $fleursCompo): self
    {
        if ($this->fleursCompo->removeElement($fleursCompo)) {
            // set the owning side to null (unless already changed)
            if ($fleursCompo->getFleur() === $this) {
                $fleursCompo->setFleur(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return "{$this->nom} - {$this->couleurFleur} - {$this->prix}€/p - (vendue par {$this->conditionnement})";
    }
}
