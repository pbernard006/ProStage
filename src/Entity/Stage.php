<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StageRepository")
 */
class Stage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Formation", inversedBy="stages")
     */
    private $laFormation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="stages")
     */
    private $laEntreprise;

    public function __construct()
    {
        $this->laFormation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getLaFormation(): Collection
    {
        return $this->laFormation;
    }

    public function addLaFormation(Formation $laFormation): self
    {
        if (!$this->laFormation->contains($laFormation)) {
            $this->laFormation[] = $laFormation;
        }

        return $this;
    }

    public function removeLaFormation(Formation $laFormation): self
    {
        if ($this->laFormation->contains($laFormation)) {
            $this->laFormation->removeElement($laFormation);
        }

        return $this;
    }

    public function getLaEntreprise(): ?Entreprise
    {
        return $this->laEntreprise;
    }

    public function setLaEntreprise(?Entreprise $laEntreprise): self
    {
        $this->laEntreprise = $laEntreprise;

        return $this;
    }
}
