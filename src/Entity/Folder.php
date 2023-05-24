<?php

namespace App\Entity;

use App\Repository\FolderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FolderRepository::class)
 */
class Folder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Created;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Object;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Other;

    /**
     * @ORM\Column(type="integer")
     */
    private $Amount;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Statut;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="User")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Verification::class, mappedBy="folder")
     */
    private $verifications;

    /**
     * @ORM\OneToMany(targetEntity=File::class, mappedBy="folder")
     */
    private $files;

    public function __construct()
    {
        $this->verifications = new ArrayCollection();
        $this->files = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->Created;
    }

    public function setCreated(\DateTimeInterface $Created): self
    {
        $this->Created = $Created;

        return $this;
    }

    public function getObject(): ?string
    {
        return $this->Object;
    }

    public function setObject(string $Object): self
    {
        $this->Object = $Object;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->Code;
    }

    public function setCode(string $Code): self
    {
        $this->Code = $Code;

        return $this;
    }

    public function getOther(): ?string
    {
        return $this->Other;
    }

    public function setOther(string $Other): self
    {
        $this->Other = $Other;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->Amount;
    }

    public function setAmount(int $Amount): self
    {
        $this->Amount = $Amount;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->Statut;
    }

    public function setStatut(bool $Statut): self
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Verification>
     */
    public function getVerifications(): Collection
    {
        return $this->verifications;
    }

    public function addVerification(Verification $verification): self
    {
        if (!$this->verifications->contains($verification)) {
            $this->verifications[] = $verification;
            $verification->setFolder($this);
        }

        return $this;
    }

    public function removeVerification(Verification $verification): self
    {
        if ($this->verifications->removeElement($verification)) {
            // set the owning side to null (unless already changed)
            if ($verification->getFolder() === $this) {
                $verification->setFolder(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setFolder($this);
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getFolder() === $this) {
                $file->setFolder(null);
            }
        }

        return $this;
    }
}
