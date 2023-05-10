<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: BandRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this Username')]
class Band implements UserInterface, PasswordAuthenticatedUserInterface
{
     #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

//    #[ORM\OneToMany(mappedBy: 'band', targetEntity: BandMember::class)]
//    private Collection $bandMembers;



    #[ORM\Column(length: 255)]
    private ?string $password = null;


    #[ORM\Column(length: 255)]
    private ?string $BandMembers = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;







    public function __construct()
    {
        $this->bandMembers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }



//
//    public function addBandMember(BandMember $bandMember): self
//    {
//        if (!$this->bandMembers->contains($bandMember)) {
//            $this->bandMembers->add($bandMember);
//            $bandMember->setBand($this);
//        }
//
//        return $this;
//    }
//
//    public function removeBandMember(BandMember $bandMember): self
//    {
//        if ($this->bandMembers->removeElement($bandMember)) {
//            // set the owning side to null (unless already changed)
//            if ($bandMember->getBand() === $this) {
//                $bandMember->setBand(null);
//            }
//        }
//
//        return $this;
//    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getRoles(): array
    {
       return ['ROLE_BAND'];
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->id;
    }



    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getBandMembers(): string
    {
        return $this->BandMembers;
    }



    public function setBandMembers(string $BandMembers): self
    {
        $this->BandMembers = $BandMembers;

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



}
