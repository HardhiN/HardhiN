<?php

namespace App\Entity;

use App\Repository\ConseillerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConseillerRepository::class)
 */
class Conseiller
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Prenoms;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNomination;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ArreteNomin;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateAbrog;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ArreteAbrog;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Observation;

    /**
     * @ORM\ManyToOne(targetEntity=Depute::class, inversedBy="conseillers")
     */
    private $Deputes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->Prenoms;
    }

    public function setPrenoms(?string $Prenoms): self
    {
        $this->Prenoms = $Prenoms;

        return $this;
    }

    public function getDateNomination(): ?\DateTimeInterface
    {
        return $this->DateNomination;
    }

    public function setDateNomination(\DateTimeInterface $DateNomination): self
    {
        $this->DateNomination = $DateNomination;

        return $this;
    }

    public function getArreteNomin(): ?string
    {
        return $this->ArreteNomin;
    }

    public function setArreteNomin(string $ArreteNomin): self
    {
        $this->ArreteNomin = $ArreteNomin;

        return $this;
    }

    public function getDateAbrog(): ?\DateTimeInterface
    {
        return $this->DateAbrog;
    }

    public function setDateAbrog(?\DateTimeInterface $DateAbrog): self
    {
        $this->DateAbrog = $DateAbrog;

        return $this;
    }

    public function getArreteAbrog(): ?string
    {
        return $this->ArreteAbrog;
    }

    public function setArreteAbrog(?string $ArreteAbrog): self
    {
        $this->ArreteAbrog = $ArreteAbrog;

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

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(?string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->Observation;
    }

    public function setObservation(?string $Observation): self
    {
        $this->Observation = $Observation;

        return $this;
    }

    public function getDeputes(): ?Depute
    {
        return $this->Deputes;
    }

    public function setDeputes(?Depute $Deputes): self
    {
        $this->Deputes = $Deputes;

        return $this;
    }
    public function __toString() {
        return $this->nom;
    }
}
