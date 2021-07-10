<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $assurance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $visiteTechnique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carteGrise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pneuDeSecour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $materielDeSecours;

    /**
     * @ORM\ManyToOne(targetEntity=Chauffeur::class, inversedBy="voitures")
     */
    private $chauffeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    public function setAssurance(string $assurance): self
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getVisiteTechnique(): ?string
    {
        return $this->visiteTechnique;
    }

    public function setVisiteTechnique(string $visiteTechnique): self
    {
        $this->visiteTechnique = $visiteTechnique;

        return $this;
    }

    public function getCarteGrise(): ?string
    {
        return $this->carteGrise;
    }

    public function setCarteGrise(string $carteGrise): self
    {
        $this->carteGrise = $carteGrise;

        return $this;
    }

    public function getPneuDeSecour(): ?string
    {
        return $this->pneuDeSecour;
    }

    public function setPneuDeSecour(string $pneuDeSecour): self
    {
        $this->pneuDeSecour = $pneuDeSecour;

        return $this;
    }

    public function getMaterielDeSecours(): ?string
    {
        return $this->materielDeSecours;
    }

    public function setMaterielDeSecours(string $materielDeSecours): self
    {
        $this->materielDeSecours = $materielDeSecours;

        return $this;
    }

    public function getChauffeur(): ?chauffeur
    {
        return $this->chauffeur;
    }

    public function setChauffeur(?chauffeur $chauffeur): self
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }
}
