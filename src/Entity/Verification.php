<?php

namespace App\Entity;

use App\Repository\VerificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VerificationRepository::class)
 */
class Verification
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
    private $Sign;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Statut;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="verification", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Folder::class, inversedBy="verifications")
     */
    private $folder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSign(): ?string
    {
        return $this->Sign;
    }

    public function setSign(string $Sign): self
    {
        $this->Sign = $Sign;

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

    public function getFolder(): ?Folder
    {
        return $this->folder;
    }

    public function setFolder(?Folder $folder): self
    {
        $this->folder = $folder;

        return $this;
    }
}
