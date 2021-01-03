<?php

namespace App\Entity;

use App\Repository\TripRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="Trip")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass=TripRepository::class)
 */
class Trip
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
    private $nameTrip;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDeparture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cityDeparture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateArrival;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cityDestination;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberPlaces;

    /**
     * @ORM\Column(type="integer")
     */
    private $placeAvailable;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $distance;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="trip")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userTrip;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="trip")
     */
    private $reservation;

    /**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="trip")
     */
    private $comment;

    /**
     * @ORM\Column(type="time")
     */
    private $departureTime;

    /**
     * @ORM\Column(type="time")
     */
    private $timeArrival;

    /**
     *  @var string
     *  @Gedmo\Slug(fields={"nameTrip"})
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $slug;

    public function __construct()
    {
        $this->reservation = new ArrayCollection();
        $this->comment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTrip(): ?string
    {
        return $this->nameTrip;
    }

    public function setNameTrip(string $nameTrip): self
    {
        $this->nameTrip = $nameTrip;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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

    public function getCityDeparture(): ?string
    {
        return $this->cityDeparture;
    }

    public function setCityDeparture(string $cityDeparture): self
    {
        $this->cityDeparture = $cityDeparture;

        return $this;
    }

    public function getDateArrival(): ?\DateTimeInterface
    {
        return $this->dateArrival;
    }

    public function setDateArrival(\DateTimeInterface $dateArrival): self
    {
        $this->dateArrival = $dateArrival;

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

    public function getNumberPlaces(): ?int
    {
        return $this->numberPlaces;
    }

    public function setNumberPlaces(int $numberPlaces): self
    {
        $this->numberPlaces = $numberPlaces;

        return $this;
    }

    public function getPlaceAvailable(): ?int
    {
        return $this->placeAvailable;
    }

    public function setPlaceAvailable(int $placeAvailable): self
    {
        $this->placeAvailable = $placeAvailable;

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

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(?int $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getUserTrip(): ?User
    {
        return $this->userTrip;
    }

    public function setUserTrip(?User $userTrip): self
    {
        $this->userTrip = $userTrip;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation[] = $reservation;
            $reservation->setTrip($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getTrip() === $this) {
                $reservation->setTrip(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comment->contains($comment)) {
            $this->comment[] = $comment;
            $comment->setTrip($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getTrip() === $this) {
                $comment->setTrip(null);
            }
        }

        return $this;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departureTime;
    }

    public function setDepartureTime(\DateTimeInterface $departureTime): self
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    public function getTimeArrival(): ?\DateTimeInterface
    {
        return $this->timeArrival;
    }

    public function setTimeArrival(\DateTimeInterface $timeArrival): self
    {
        $this->timeArrival = $timeArrival;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }
}
