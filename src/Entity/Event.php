<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $StartTime = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $EndTime = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\ManyToOne(inversedBy: 'event')]
    private ?Band $band = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartTime(): ?\DateTimeImmutable
    {
        return $this->StartTime;
    }

    public function setStartTime(\DateTimeImmutable $StartTime): self
    {
        $this->StartTime = $StartTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeImmutable
    {
        return $this->EndTime;
    }

    public function setEndTime(\DateTimeImmutable $EndTime): self
    {
        $this->EndTime = $EndTime;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

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
