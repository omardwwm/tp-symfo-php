<?php

namespace App\Entity;

use App\Repository\AlllegumesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlllegumesRepository::class)
 */
class Alllegumes
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
     * @ORM\ManyToMany(targetEntity=Mois::class, inversedBy="legume")
     */
    private $mounth;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $slogan;

    /**
     * @ORM\Column(type="text")
     */
    private $recettes;

    public function __construct()
    {
        $this->mounth = new ArrayCollection();
    }

    public function __toString(){
        return $this->getNom();
    }
//
//    public function __toString(){
//        return $this->getRecettes();
//    }


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
    public function getMounth(): Collection
    {
        return $this->mounth;
    }

    public function addMounth(Mois $mounth): self
    {
        if (!$this->mounth->contains($mounth)) {
            $this->mounth[] = $mounth;
        }

        return $this;
    }

    public function removeMounth(Mois $mounth): self
    {
        $this->mounth->removeElement($mounth);

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(string $slogan): self
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getRecettes(): ?string
    {
        return $this->recettes;
    }

    public function setRecettes(string $recettes): self
    {
        $this->recettes = $recettes;

        return $this;
    }
}
