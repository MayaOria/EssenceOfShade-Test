<?php

namespace App\Entity;

use App\Entity\FleurCompo;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateEvenement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $persoContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $horaire = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'evenements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeEvenement $typeEvenement = null;

    #[ORM\ManyToMany(targetEntity: Prestataire::class, inversedBy: 'evenements')]
    private Collection $prestataires;

    #[ORM\ManyToMany(targetEntity: Moodboard::class, inversedBy: 'evenements')]
    private Collection $couleurs;

    #[ORM\OneToMany(mappedBy: 'evenement', targetEntity: CompoEvenement::class, cascade:['persist', 'remove'])]
    private Collection $compos;

    public function __construct()
    {
        $this->prestataires = new ArrayCollection();
        $this->couleurs = new ArrayCollection();
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

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(?\DateTimeInterface $dateEvenement): self
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getPersoContact(): ?string
    {
        return $this->persoContact;
    }

    public function setPersoContact(?string $persoContact): self
    {
        $this->persoContact = $persoContact;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getHoraire(): ?string
    {
        return $this->horaire;
    }

    public function setHoraire(?string $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTypeEvenement(): ?TypeEvenement
    {
        return $this->typeEvenement;
    }

    public function setTypeEvenement(?TypeEvenement $typeEvenement): self
    {
        $this->typeEvenement = $typeEvenement;

        return $this;
    }

    /**
     * @return Collection<int, Prestataire>
     */
    public function getPrestataires(): Collection
    {
        return $this->prestataires;
    }

    public function addPrestataire(Prestataire $prestataire): self
    {
        if (!$this->prestataires->contains($prestataire)) {
            $this->prestataires->add($prestataire);
        }

        return $this;
    }

    public function removePrestataire(Prestataire $prestataire): self
    {
        $this->prestataires->removeElement($prestataire);

        return $this;
    }

    /**
     * @return Collection<int, Moodboard>
     */
    public function getCouleurs(): Collection
    {
        return $this->couleurs;
    }

    public function addCouleur(Moodboard $couleur): self
    {
        if (!$this->couleurs->contains($couleur)) {
            $this->couleurs->add($couleur);
        }

        return $this;
    }

    public function removeCouleur(Moodboard $couleur): self
    {
        $this->couleurs->removeElement($couleur);

        return $this;
    }

    /**
     * @return Collection<int, CompoEvenement>
     */
    public function getCompos(): Collection
    {
        return $this->compos;
    }

    public function addCompo(CompoEvenement $compo): self
    {
        if (!$this->compos->contains($compo)) {
            $this->compos->add($compo);
            $compo->setEvenement($this);
        }

        return $this;
    }

    public function removeCompo(CompoEvenement $compo): self
    {
        if ($this->compos->removeElement($compo)) {
            // set the owning side to null (unless already changed)
            if ($compo->getEvenement() === $this) {
                $compo->setEvenement(null);
            }
        }

        return $this;
    }

    public function getDevis()
    {


        $res = [];
//pour chaque "CompoEvenement" d'un événement  
        foreach($this->compos as $compo)
        {
            //pour retyper quand on perd l'autocomplétion
            /** @var CompoEvenement $compo */
            //récupère les "FleurCompo" qui sont dans la composition de la "CompoEvenement"
            foreach($compo->getComposition()->getFleursCompo() as $fleurCompo){
                //dd($fleurCompo);
                //Vérifie si la fleur de la "fleurCompo" est déjà dans le tableau 
                $line = current(array_filter($res, function($item) use($fleurCompo) {
                    return $item->getFleur() === $fleurCompo->getFleur();
                }));
                //La quantité de la fleur sera la quantité necessaire dans la compo * le nombre de compo necessaire
                $quantity = $fleurCompo->getQuantite() * $compo->getQuantite();
                //Si la combinaison fleur n'est déjà dans le tableau
                if(!$line){
                    //ajoute la combinaison et set la quantité
                    $res[] = $fleurCompo->setQuantite($quantity);
                }
    
                else {
                    //sinon, on set la quantité
                    $line->setQuantite((int)$line->getQuantite() + (int)$quantity);
                }
            }
        }

        // dd($res);
        return $res;
    }
}
