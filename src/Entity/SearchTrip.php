<?php

namespace App\Entity;

use App\Repository\SearchTripRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SearchTripRepository::class)
 */
class SearchTrip
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
    private $CityDeparture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cityDestination;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDeparture;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberPlaces;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $departureTime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityDeparture(): ?string
    {
        return $this->CityDeparture;
    }

    public function setCityDeparture(string $CityDeparture): self
    {
        $this->CityDeparture = $CityDeparture;

        return $this;
    }

    public function getCityDestination(): ?string
    {
        return $this->cityDestination;
    }

    public function setCityDestination(string $cityDestination): self
    {
        $this->cityDestination = $cityDestination;

        return $this;
    }

    public function getDateDeparture(): ?\DateTimeInterface
    {
        return $this->dateDeparture;
    }

    public function setDateDeparture(\DateTimeInterface $dateDeparture): self
    {
        $this->dateDeparture = $dateDeparture;

        return $this;
    }

    public function getNumberPlaces(): ?int
    {
        return $this->numberPlaces;
    }

    public function setNumberPlaces(int $numberPlaces): self
    {
        $this->numberPlaces = $numberPlaces;

        return $this;
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departureTime;
    }

    public function setDepartureTime(?\DateTimeInterface $departureTime): self
    {
        $this->departureTime = $departureTime;

        return $this;
    }
}
