<?php

namespace App\Entity;

use App\Repository\CompositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompositionRepository::class)]
class Composition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'compos')]
    #[ORM\JoinColumn(nullable: true)]
    private ?TypeCompo $typeCompo = null;

    #[ORM\OneToMany(mappedBy: 'composition', targetEntity: FleurCompo::class, cascade:['persist', 'remove'])]
    private Collection $fleursCompo;

    #[ORM\OneToMany(mappedBy: 'composition', targetEntity: CompoEvenement::class)]
    private Collection $composEvenement;

    public function __construct()
    {
        $this->fleursCompo = new ArrayCollection();
        $this->composEvenement = new ArrayCollection();
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

    public function getTypeCompo(): ?TypeCompo
    {
        return $this->typeCompo;
    }

    public function setTypeCompo(?TypeCompo $typeCompo): self
    {
        $this->typeCompo = $typeCompo;

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
            $fleursCompo->setComposition($this);
        }

        return $this;
    }

    public function removeFleursCompo(FleurCompo $fleursCompo): self
    {
        if ($this->fleursCompo->removeElement($fleursCompo)) {
            // set the owning side to null (unless already changed)
            if ($fleursCompo->getComposition() === $this) {
                $fleursCompo->setComposition(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CompoEvenement>
     */
    public function getComposEvenement(): Collection
    {
        return $this->composEvenement;
    }

    public function addComposEvenement(CompoEvenement $composEvenement): self
    {
        if (!$this->composEvenement->contains($composEvenement)) {
            $this->composEvenement->add($composEvenement);
            $composEvenement->setComposition($this);
        }

        return $this;
    }

    public function removeComposEvenement(CompoEvenement $composEvenement): self
    {
        if ($this->composEvenement->removeElement($composEvenement)) {
            // set the owning side to null (unless already changed)
            if ($composEvenement->getComposition() === $this) {
                $composEvenement->setComposition(null);
            }
        }

        return $this;
    }
}
