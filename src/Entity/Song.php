<?php

namespace App\Entity;

use App\Repository\SongRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SongRepository::class)]
class Song
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'song', targetEntity: EventSong::class)]
    private Collection $eventSongs;

    #[ORM\OneToMany(mappedBy: 'song', targetEntity: BandSong::class)]
    private Collection $bandSongs;

    public function __construct()
    {
        $this->eventSongs = new ArrayCollection();
        $this->bandSongs = new ArrayCollection();
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

    /**
     * @return Collection<int, EventSong>
     */
    public function getEventSongs(): Collection
    {
        return $this->eventSongs;
    }

    public function addEventSong(EventSong $eventSong): self
    {
        if (!$this->eventSongs->contains($eventSong)) {
            $this->eventSongs->add($eventSong);
            $eventSong->setSong($this);
        }

        return $this;
    }

    public function removeEventSong(EventSong $eventSong): self
    {
        if ($this->eventSongs->removeElement($eventSong)) {
            // set the owning side to null (unless already changed)
            if ($eventSong->getSong() === $this) {
                $eventSong->setSong(null);
            }
        }

        return $this;
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
            $bandSong->setSong($this);
        }

        return $this;
    }

    public function removeBandSong(BandSong $bandSong): self
    {
        if ($this->bandSongs->removeElement($bandSong)) {
            // set the owning side to null (unless already changed)
            if ($bandSong->getSong() === $this) {
                $bandSong->setSong(null);
            }
        }

        return $this;
    }
}
