<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: RaceRepository::class)]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $round = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $circuit = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $location = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column]
    private ?int $season = null;

    /**
     * @var Collection<int, Result>
     */
    #[ORM\OneToMany(targetEntity: Result::class, mappedBy: 'race', orphanRemoval: true)]
    private Collection $results;

    public function __construct()
    {
        $this->results = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    // get and set Round
    public function getRound(): ?int
    {
        return $this->round;
    }
    public function setRound(?int $round): static
    {
        $this->round = $round;
        return $this;
    }
    // get and set Circuit
    public function getCircuit(): ?string
    {
        return $this->circuit;
    }
    public function setCircuit(string $circuit): static
    {
        $this->circuit = $circuit;
        return $this;
    }
    // get and set Name
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
    // get and set Location
    public function getLocation(): ?string
    {
        return $this->location;
    }
    public function setLocation(?string $location): static
    {
        $this->location = $location;

        return $this;
    }
    // get and set Date
    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }
    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    // get and set Season
    public function getSeason(): ?int
    {
        return $this->season;
    }
    public function setSeason(?int $season): static
    {
        $this->season = $season;
        return $this;
    }

    /**
     * @return Collection<int, Result>
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(Result $result): static
    {
        if (!$this->results->contains($result)) {
            $this->results->add($result);
            $result->setRace($this);
        }

        return $this;
    }

    public function removeResult(Result $result): static
    {
        if ($this->results->removeElement($result)) {
            // set the owning side to null (unless already changed)
            if ($result->getRace() === $this) {
                $result->setRace(null);
            }
        }

        return $this;
    }
}