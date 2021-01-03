<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
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
    private $reservationDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberRemainingPlaces;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserReservation;

    /**
     * @ORM\ManyToOne(targetEntity=Trip::class, inversedBy="reservation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trip;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservationDate(): ?\DateTimeInterface
    {
        return $this->reservationDate;
    }

    public function setReservationDate(\DateTimeInterface $reservationDate): self
    {
        $this->reservationDate = $reservationDate;

        return $this;
    }

    public function getNumberRemainingPlaces(): ?int
    {
        return $this->numberRemainingPlaces;
    }

    public function setNumberRemainingPlaces(int $numberRemainingPlaces): self
    {
        $this->numberRemainingPlaces = $numberRemainingPlaces;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUserReservation(): ?User
    {
        return $this->UserReservation;
    }

    public function setUserReservation(?User $UserReservation): self
    {
        $this->UserReservation = $UserReservation;

        return $this;
    }

    public function getTrip(): ?Trip
    {
        return $this->trip;
    }

    public function setTrip(?Trip $trip): self
    {
        $this->trip = $trip;

        return $this;
    }
}
