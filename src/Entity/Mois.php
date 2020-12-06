<?php

namespace App\Entity;

use App\Repository\MoisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MoisRepository::class)
 */
class Mois
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
     * @ORM\ManyToMany(targetEntity=Alllegumes::class, mappedBy="mounth")
     */
    private $legume;

    public function __construct()
    {
        $this->legume = new ArrayCollection();
    }

    public function __toString(){
        return $this->getNom();
    }
//    public function __toString(){
//        return $this->getLegume();
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
     * @return Collection|Alllegumes[]
     */
    public function getLegume(): Collection
    {
        return $this->legume;
    }

    public function addLegume(Alllegumes $legume): self
    {
        if (!$this->legume->contains($legume)) {
            $this->legume[] = $legume;
            $legume->addMounth($this);
        }

        return $this;
    }

    public function removeLegume(Alllegumes $legume): self
    {
        if ($this->legume->removeElement($legume)) {
            $legume->removeMounth($this);
        }

        return $this;
    }
}
