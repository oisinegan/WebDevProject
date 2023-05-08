<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BandRepository::class)]
class Band
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\OneToMany(mappedBy: 'band', targetEntity: BandMember::class)]
    private Collection $bandMembers;

    #[ORM\OneToMany(mappedBy: 'band', targetEntity: BandSong::class)]
    private Collection $bandSongs;

    #[ORM\OneToMany(mappedBy: 'band', targetEntity: Event::class)]
    private Collection $events;


    public function __construct()
    {
        $this->bandMembers = new ArrayCollection();
        $this->bandSongs = new ArrayCollection();
        $this->events = new ArrayCollection();
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

    /**
     * @return Collection<int, BandMember>
     */
    public function getBandMembers(): Collection
    {
        return $this->bandMembers;
    }


    public function addBandMember(BandMember $bandMember): self
    {
        if (!$this->bandMembers->contains($bandMember)) {
            $this->bandMembers->add($bandMember);
            $bandMember->setBand($this);
        }

        return $this;
    }

    public function removeBandMember(BandMember $bandMember): self
    {
        if ($this->bandMembers->removeElement($bandMember)) {
            // set the owning side to null (unless already changed)
            if ($bandMember->getBand() === $this) {
                $bandMember->setBand(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return Collection<int, BandSong>
     */
    public function getBandSongs(): Collection
    {
        return $this->bandSongs;
    }

    public function addBandSong(BandSong $bandSong): self
    {
        if (!$this->bandSongs->contains($bandSong)) {
            $this->bandSongs->add($bandSong);
            $bandSong->setBand($this);
        }

        return $this;
    }

    public function removeBandSong(BandSong $bandSong): self
    {
        if ($this->bandSongs->removeElement($bandSong)) {
            // set the owning side to null (unless already changed)
            if ($bandSong->getBand() === $this) {
                $bandSong->setBand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setBand($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getBand() === $this) {
                $event->setBand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */

}
