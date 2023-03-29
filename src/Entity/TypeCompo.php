<?php

namespace App\Entity;

use App\Repository\TypeCompoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeCompoRepository::class)]
class TypeCompo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'typeCompo', targetEntity: Composition::class)]
    private Collection $compos;

    public function __construct()
    {
        $this->compos = new ArrayCollection();
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
     * @return Collection<int, Composition>
     */
    public function getTypeCompo(): Collection
    {
        return $this->compos;
    }

    public function addTypeCompo(Composition $typeCompo): self
    {
        if (!$this->compos->contains($typeCompo)) {
            $this->compos->add($typeCompo);
            $typeCompo->setTypeCompo($this);
        }

        return $this;
    }

    public function removeTypeCompo(Composition $typeCompo): self
    {
        if ($this->compos->removeElement($typeCompo)) {
            // set the owning side to null (unless already changed)
            if ($typeCompo->getTypeCompo() === $this) {
                $typeCompo->setTypeCompo(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
