<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DircabRepository;

/**
 * @ORM\Entity(repositoryClass=DircabRepository::class)
 */
class Dircab
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Prenoms;

    /**
     * @ORM\Column(type="date",nullable=false )
     */
    private $Date_Nomin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Arrete_Nomin;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_Abrog;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Arrete_Abrog;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Phone;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $observation;

    /**
     * @ORM\ManyToOne(targetEntity=Depute::class, inversedBy="dircabs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $depute;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
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

    public function getDateNomin(): ?\DateTimeInterface
    {
        return $this->Date_Nomin;
    }

    public function setDateNomin(\DateTimeInterface $Date_Nomin): self
    {
        $this->Date_Nomin = $Date_Nomin;

        return $this;
    }

    public function getArreteNomin(): ?string
    {
        return $this->Arrete_Nomin;
    }

    public function setArreteNomin(string $Arrete_Nomin): self
    {
        $this->Arrete_Nomin = $Arrete_Nomin;

        return $this;
    }

    public function getDateAbrog(): ?\DateTimeInterface
    {
        return $this->Date_Abrog;
    }

    public function setDateAbrog(?\DateTimeInterface $Date_Abrog): self
    {
        $this->Date_Abrog = $Date_Abrog;

        return $this;
    }

    public function getArreteAbrog(): ?string
    {
        return $this->Arrete_Abrog;
    }

    public function setArreteAbrog(?string $Arrete_Abrog): self
    {
        $this->Arrete_Abrog = $Arrete_Abrog;

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

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(?string $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getDepute(): ?Depute
    {
        return $this->depute;
    }
    
    public function setDepute(?Depute $depute): self
    {
        $this->depute = $depute;

        return $this;
    }
}
