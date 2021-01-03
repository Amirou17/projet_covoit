<?php

namespace App\Controller;

use App\Entity\SearchTrip;
use App\Entity\Trip;
use App\Entity\User;
use App\Form\SearchTripType;
use App\Form\TripType;
use App\Form\UserType;
use App\Service\ProposedTrip;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TripController extends AbstractController
{
    /**
     * @Route("/trip", name="trip")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function list(EntityManagerInterface $em): Response
    {


        // List of trips
        $trips = $this->getDoctrine()->getRepository(Trip::class)->getUnexpiredTrips();

        // Search Form
        $search = new SearchTrip();
        $form = $this->createForm(SearchTripType::class, $search);
        return $this->render('trip/index.html.twig', [
            'form' => $form->createView(),
            'trips' => $trips,
        ]);
    }

    /**
     *
     * @Route("/trip/{slug}", name="view.trip")
     * @param Trip $trip
     * @return Response
     */
    public function showTrip(Trip $trip) : Response{

        $otherTrips = $this->getDoctrine()->getRepository(Trip::class)->getSameNametrip($trip);
        return $this->render('trip/showTrip.html.twig', [
            'trip' => $trip,
            'otherTrips' => $otherTrips,
        ]);
    }

    /**
     * @Route("/recherche", name="recherche.trip")
     */
    public function rechercheTrip(){

        // List of trips
        $trips = $this->getDoctrine()->getRepository(Trip::class)->findAll();

        $search = new SearchTrip();
        $form = $this->createForm(SearchTripType::class, $search);
        return $this->render('trip/rechecheTrip.html.twig', [
            'form' => $form->createView(),
            'trips' => $trips
        ]);
    }

    /**
     * Create a new Trip
     * @Route("/create-trip", name="create.trip")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param ProposedTrip $proposedTrip
     * @return RedirectResponse|Response
     */
    public function createTrips(Request $request, EntityManagerInterface $em, ProposedTrip $proposedTrip) : Response{

        $trip = new Trip();
        $form = $this->createForm(TripType::class, $trip);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($trip);
            $trip->setUserTrip($this->getUser());
            $nameTrip = $trip->getCityDeparture() . " - " . $trip->getCityDestination();
            $trip->setNameTrip($nameTrip);
            $trip->setPlaceAvailable($trip->getNumberPlaces());
            $em->persist($trip);

            $em->flush();
            return $this->redirectToRoute('trip');
        }


        return $this->render('trip/createTrip.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/myTrip", name="my.trip")
     * @return Response
     */
    public function proposedTrip(){

        $proposedTrips = $this->getDoctrine()->getRepository(Trip::class)->getAUsersTripExecute($this->getUser()->getId());
        return $this->render('trip/proposedTrip.html.twig', [
            'proposedTrips' => $proposedTrips
        ]);
    }
}
