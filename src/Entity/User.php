<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Token_Reset;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="user")
     */
    private $agence;

    /**
     * @ORM\ManyToOne(targetEntity=Fonction::class, inversedBy="user")
     */
    private $fonction;

    /**
     * @ORM\OneToOne(targetEntity=Verification::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $verification;

    /**
     * @ORM\OneToMany(targetEntity=Folder::class, mappedBy="user")
     */
    private $User;

    public function __construct()
    {
        $this->User = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): self
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

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

    public function getTokenReset(): ?string
    {
        return $this->Token_Reset;
    }

    public function setTokenReset(string $Token_Reset): self
    {
        $this->Token_Reset = $Token_Reset;

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getFonction(): ?Fonction
    {
        return $this->fonction;
    }

    public function setFonction(?Fonction $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getVerification(): ?Verification
    {
        return $this->verification;
    }

    public function setVerification(?Verification $verification): self
    {
        // unset the owning side of the relation if necessary
        if ($verification === null && $this->verification !== null) {
            $this->verification->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($verification !== null && $verification->getUser() !== $this) {
            $verification->setUser($this);
        }

        $this->verification = $verification;

        return $this;
    }

    /**
     * @return Collection<int, Folder>
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(Folder $user): self
    {
        if (!$this->User->contains($user)) {
            $this->User[] = $user;
            $user->setUser($this);
        }

        return $this;
    }

    public function removeUser(Folder $user): self
    {
        if ($this->User->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUser() === $this) {
                $user->setUser(null);
            }
        }

        return $this;
    }
}
