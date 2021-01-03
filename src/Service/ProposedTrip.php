<?php
namespace App\Service;

use App\Entity\Trip;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ProposedTrip
{
    /** @var SessionInterface */
    private $session;

    /** @var EntityManagerInterface */
    private $em;

    /**
     * @param SessionInterface $session
     * @param EntityManagerInterface $em
     */
    public function __construct(SessionInterface $session, EntityManagerInterface $em)
    {
        $this->session = $session;
        $this->em = $em;
    }

    /**
     * @param Trip $trip
     *
     * @return void
     */
    public function addTrip(Trip $trip) : void
    {

        $trips = $this->getTripsIds();

        // Adds the identifier of a route to the beginning of the table
        array_unshift($trips, $trip->getId());
        dump($trips);

        // delete the id. redundants
        $trips = array_unique($trips);

        // Garder uniquement 3 elements
        //$stages = array_slice($trip, 0, self::MAX);
        // Sauvegarder les ids dans la session
        $this->session->set('proposed_trip', $trips);
    }

    /**
     * @return array
     */
    private function getTripsIds() : array
    {
        return $this->session->get('proposed_trip', []);
    }

    /**
     * @return Trip[]
     */
    public function getTrip() : array
    {
        $trips = [];
        $tripRepository = $this->em->getRepository(Trip::class);
        dump($this->getTripsIds());
        foreach ($this->getTripsIds() as $tripId) {
            $trips[] = $tripRepository->find($tripId);
        }

        return array_filter($trips);
    }
}
