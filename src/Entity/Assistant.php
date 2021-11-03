<?php

namespace App\Entity;

use App\Repository\AssistantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssistantRepository::class)
 */
class Assistant
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
    private $AssNom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AssPrenom;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNomination;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ArreteNomination;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateAbrogation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ArreteAbrog;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Observation;

    /**
     * @ORM\ManyToOne(targetEntity=Depute::class, inversedBy="assistant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $depute;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Telephone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAssNom(): ?string
    {
        return $this->AssNom;
    }

    public function setAssNom(?string $AssNom): self
    {
        $this->AssNom = $AssNom;

        return $this;
    }

    public function getAssPrenom(): ?string
    {
        return $this->AssPrenom;
    }

    public function setAssPrenom(?string $AssPrenom): self
    {
        $this->AssPrenom = $AssPrenom;

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

    public function getArreteNomination(): ?string
    {
        return $this->ArreteNomination;
    }

    public function setArreteNomination(string $ArreteNomination): self
    {
        $this->ArreteNomination = $ArreteNomination;

        return $this;
    }

    public function getDateAbrogation(): ?\DateTimeInterface
    {
        return $this->DateAbrogation;
    }

    public function setDateAbrogation(?\DateTimeInterface $DateAbrogation): self
    {
        $this->DateAbrogation = $DateAbrogation;

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
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

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

    public function getDepute(): ?Depute
    {
        return $this->depute;
    }

    public function setDepute(?Depute $depute): self
    {
        $this->depute = $depute;

        return $this;
    }
    public function __toString() {
        return $this->name;
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
}
