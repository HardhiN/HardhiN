<?php

namespace App\Entity;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DeputeRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=DeputeRepository::class)
 * @Vich\Uploadable
 */
class Depute
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
    private $DepNom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $DepPrenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DepCirco;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DepDecision;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DepEntite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DepNumArrete;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $DepPhoto;

     /**
     * @Vich\UploadableField(mapping="deputes_images", fileNameProperty="DepPhoto")
     * @var File
     */
    private $DepPhotoFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * @ORM\OneToMany(targetEntity=Assistant::class, mappedBy="depute")
     */
    private $assistant;

    /**
     * @ORM\OneToMany(targetEntity=Conseiller::class, mappedBy="Deputes")
     */
    private $conseillers;

    /**
     * @ORM\OneToMany(targetEntity=Dircab::class, mappedBy="depute", orphanRemoval=true)
     */
    private $dircabs;

    /**
     * @ORM\Column(type="integer", length=255,unique=true)
     */
    private $Num;

    public function setDepPhotoFile(File $image = null)
    {
        $this->DepPhotoFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }




     /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Image
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    public function getDepPhotoFile()
    {
        return $this->DepPhotoFile;
    }
    public function __construct()
    {
        $this->assistant = new ArrayCollection();
        $this->conseillers = new ArrayCollection();
        $this->dircabs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepNom(): ?string
    {
        return $this->DepNom;
    }

    public function setDepNom(?string $DepNom): self
    {
        $this->DepNom = $DepNom;

        return $this;
    }

    public function getDepPrenom(): ?string
    {
        return $this->DepPrenom;
    }

    public function setDepPrenom(?string $DepPrenom): self
    {
        $this->DepPrenom = $DepPrenom;

        return $this;
    }

    public function getDepCirco(): ?string
    {
        return $this->DepCirco;
    }

    public function setDepCirco(string $DepCirco): self
    {
        $this->DepCirco = $DepCirco;

        return $this;
    }

    public function getDepDecision(): ?string
    {
        return $this->DepDecision;
    }

    public function setDepDecision(string $DepDecision): self
    {
        $this->DepDecision = $DepDecision;

        return $this;
    }

    public function getDepEntite(): ?string
    {
        return $this->DepEntite;
    }

    public function setDepEntite(string $DepEntite): self
    {
        $this->DepEntite = $DepEntite;

        return $this;
    }

    public function getDepNumArrete(): ?string
    {
        return $this->DepNumArrete;
    }

    public function setDepNumArrete(string $DepNumArrete): self
    {
        $this->DepNumArrete = $DepNumArrete;

        return $this;
    }

    public function getDepPhoto(): ?string
    {
        return $this->DepPhoto;
    }

    public function setDepPhoto(?string $DepPhoto): self
    {
        $this->DepPhoto = $DepPhoto;

        return $this;
    }

    /**
     * @return Collection|Assistant[]
     */
    public function getAssistant(): Collection
    {
        return $this->assistant;
    }

    public function addAssistant(Assistant $assistant): self
    {
        if (!$this->assistant->contains($assistant)) {
            $this->assistant[] = $assistant;
            $assistant->setDepute($this);
        }

        return $this;
    }

    public function removeAssistant(Assistant $assistant): self
    {
        if ($this->assistant->removeElement($assistant)) {
            // set the owning side to null (unless already changed)
            if ($assistant->getDepute() === $this) {
                $assistant->setDepute(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this->DepNom;
    }
    

    /**
     * @return Collection|Conseiller[]
     */
    public function getConseillers(): Collection
    {
        return $this->conseillers;
    }

    public function addConseiller(Conseiller $conseiller): self
    {
        if (!$this->conseillers->contains($conseiller)) {
            $this->conseillers[] = $conseiller;
            $conseiller->setDeputes($this);
        }

        return $this;
    }

    public function removeConseiller(Conseiller $conseiller): self
    {
        if ($this->conseillers->removeElement($conseiller)) {
            // set the owning side to null (unless already changed)
            if ($conseiller->getDeputes() === $this) {
                $conseiller->setDeputes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Dircab[]
     */
    public function getDircabs(): Collection
    {
        return $this->dircabs;
    }

    public function addDircab(Dircab $dircab): self
    {
        if (!$this->dircabs->contains($dircab)) {
            $this->dircabs[] = $dircab;
            $dircab->setDepute($this);
        }

        return $this;
    }

    public function removeDircab(Dircab $dircab): self
    {
        if ($this->dircabs->removeElement($dircab)) {
            // set the owning side to null (unless already changed)
            if ($dircab->getDepute() === $this) {
                $dircab->setDepute(null);
            }
        }

        return $this;
    }

    public function getNum(): ?string
    {
        return $this->Num;
    }

    public function setNum(string $Num): self
    {
        $this->Num = $Num;

        return $this;
    }   
}
