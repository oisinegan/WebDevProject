<?php

namespace App\Entity;

use App\Repository\BandSongRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BandSongRepository::class)]
class BandSong
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'bandSongs')]
    private ?Song $song = null;

    #[ORM\ManyToOne(inversedBy: 'bandSongs')]
    private ?Band $band = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSong(): ?Song
    {
        return $this->song;
    }

    public function setSong(?Song $song): self
    {
        $this->song = $song;

        return $this;
    }

    public function getBand(): ?Band
    {
        return $this->band;
    }

    public function setBand(?Band $band): self
    {
        $this->band = $band;

        return $this;
    }
}
