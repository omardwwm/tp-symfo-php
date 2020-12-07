<?php

namespace App\Entity;

use App\Repository\SaisonsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaisonsRepository::class)
 */
class Saisons
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Mois::class, mappedBy="season")
     */
    private $lesmois;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $titre;

    public function __construct()
    {
        $this->lesmois = new ArrayCollection();
    }

    public function __toString(){
        return $this->getNom();
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
     * @return Collection|Mois[]
     */
    public function getLesmois(): Collection
    {
        return $this->lesmois;
    }

    public function addLesmoi(Mois $lesmoi): self
    {
        if (!$this->lesmois->contains($lesmoi)) {
            $this->lesmois[] = $lesmoi;
            $lesmoi->setSeason($this);
        }

        return $this;
    }

    public function removeLesmoi(Mois $lesmoi): self
    {
        if ($this->lesmois->removeElement($lesmoi)) {
            // set the owning side to null (unless already changed)
            if ($lesmoi->getSeason() === $this) {
                $lesmoi->setSeason(null);
            }
        }

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }
}
