<?php

namespace App\DataFixtures;

use App\Entity\Trip;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TripFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $trip1 = new Trip();
        $trip1->setUserTrip($manager->merge($this->getReference('user1')))
              ->setCityDeparture('Nantes')
              ->setDateDeparture(new \DateTime('+4 days'))
              ->setDepartureTime(new \DateTime('+15 hours'))
              ->setCityDestination('Pau')
              ->setDateArrival($trip1->getDateDeparture())
              ->setTimeArrival(new \DateTime('+8 hours'))
              ->setNumberPlaces(3)
              ->setPlaceAvailable($trip1->getNumberPlaces())
              ->setPrice(50);
        $nameT = $trip1->getCityDeparture()." - ".$trip1->getCityDestination();
        $trip1->setNameTrip($nameT);
        $manager->persist($trip1);

        $trip2 = new Trip();
        $trip2->setUserTrip($manager->merge($this->getReference('user2')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+10 days'))
            ->setDepartureTime(new \DateTime('+12 hours'))
            ->setCityDestination('Paris')
            ->setDateArrival($trip2->getDateDeparture())
            ->setTimeArrival(new \DateTime('+13 hours'))
            ->setNumberPlaces(19)
            ->setPlaceAvailable($trip2->getNumberPlaces())
            ->setPrice(26);
        $nameT = $trip2->getCityDeparture()." - ".$trip2->getCityDestination();
        $trip2->setNameTrip($nameT);
        $manager->persist($trip2);


        $trip3 = new Trip();
        $trip3->setUserTrip($manager->merge($this->getReference('user3')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+4 days'))
            ->setDepartureTime(new \DateTime('+17 hours'))
            ->setCityDestination('Bordeaux')
            ->setDateArrival($trip3->getDateDeparture())
            ->setTimeArrival(new \DateTime('+20 hours'))
            ->setNumberPlaces(3)
            ->setPlaceAvailable($trip3->getNumberPlaces())
            ->setPrice(16);
        $nameT = $trip3->getCityDeparture()." - ".$trip3->getCityDestination();
        $trip3->setNameTrip($nameT);
        $manager->persist($trip3);

        $trip4 = new Trip();
        $trip4->setUserTrip($manager->merge($this->getReference('user4')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+1 days'))
            ->setDepartureTime(new \DateTime('+13 hours'))
            ->setCityDestination('Angers')
            ->setDateArrival($trip4->getDateDeparture())
            ->setTimeArrival(new \DateTime('+14 hours'))
            ->setNumberPlaces(2)
            ->setPlaceAvailable($trip4->getNumberPlaces())
            ->setPrice(3);
        $nameT = $trip4->getCityDeparture()." - ".$trip4->getCityDestination();
        $trip4->setNameTrip($nameT);
        $manager->persist($trip4);

        $trip5 = new Trip();
        $trip5->setUserTrip($manager->merge($this->getReference('user5')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+4 days'))
            ->setDepartureTime(new \DateTime('+13 hours'))
            ->setCityDestination('Orleans')
            ->setDateArrival($trip5->getDateDeparture())
            ->setTimeArrival(new \DateTime('+17 hours'))
            ->setNumberPlaces(2)
            ->setPlaceAvailable($trip5->getNumberPlaces())
            ->setPrice(9);
        $nameT = $trip5->getCityDeparture()." - ".$trip5->getCityDestination();
        $trip5->setNameTrip($nameT);
        $manager->persist($trip5);

        $trip6 = new Trip();
        $trip6->setUserTrip($manager->merge($this->getReference('user6')))
            ->setCityDeparture('Toulouse')
            ->setDateDeparture(new \DateTime('+2 days'))
            ->setDepartureTime(new \DateTime('+13 hours'))
            ->setCityDestination('Brest')
            ->setDateArrival($trip6->getDateDeparture())
            ->setTimeArrival(new \DateTime('+21 hours'))
            ->setNumberPlaces(3)
            ->setPlaceAvailable($trip6->getNumberPlaces())
            ->setPrice(70);
        $nameT = $trip6->getCityDeparture()." - ".$trip6->getCityDestination();
        $trip6->setNameTrip($nameT);
        $manager->persist($trip6);

        $trip7 = new Trip();
        $trip7->setUserTrip($manager->merge($this->getReference('user7')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+5 days'))
            ->setDepartureTime(new \DateTime('+5 hours'))
            ->setCityDestination('Rennes')
            ->setDateArrival($trip7->getDateDeparture())
            ->setTimeArrival(new \DateTime('+6 hours'))
            ->setNumberPlaces(4)
            ->setPlaceAvailable($trip7->getNumberPlaces())
            ->setPrice(5);
        $nameT = $trip7->getCityDeparture()." - ".$trip7->getCityDestination();
        $trip7->setNameTrip($nameT);
        $manager->persist($trip7);

        $trip8 = new Trip();
        $trip8->setUserTrip($manager->merge($this->getReference('user8')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+5 days'))
            ->setDepartureTime(new \DateTime('+15 hours'))
            ->setCityDestination('Rennes')
            ->setDateArrival($trip8->getDateDeparture())
            ->setTimeArrival(new \DateTime('+6 hours'))
            ->setNumberPlaces(3)
            ->setPlaceAvailable($trip8->getNumberPlaces())
            ->setPrice(6);
        $nameT = $trip8->getCityDeparture()." - ".$trip8->getCityDestination();
        $trip8->setNameTrip($nameT);
        $manager->persist($trip8);

        $trip9 = new Trip();
        $trip9->setUserTrip($manager->merge($this->getReference('user9')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+5 days'))
            ->setDepartureTime(new \DateTime('+15 hours'))
            ->setCityDestination('Rennes')
            ->setDateArrival($trip7->getDateDeparture())
            ->setTimeArrival(new \DateTime('+6 hours'))
            ->setNumberPlaces(3)
            ->setPlaceAvailable($trip9->getNumberPlaces())
            ->setPrice(6);
        $nameT = $trip9->getCityDeparture()." - ".$trip9->getCityDestination();
        $trip9->setNameTrip($nameT);
        $manager->persist($trip9);

        $trip10 = new Trip();
        $trip10->setUserTrip($manager->merge($this->getReference('user10')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+5 days'))
            ->setDepartureTime(new \DateTime('+15 hours'))
            ->setCityDestination('Rennes')
            ->setDateArrival($trip10->getDateDeparture())
            ->setTimeArrival(new \DateTime('+6 hours'))
            ->setNumberPlaces(3)
            ->setPlaceAvailable($trip10->getNumberPlaces())
            ->setPrice(6);
        $nameT = $trip10->getCityDeparture()." - ".$trip10->getCityDestination();
        $trip10->setNameTrip($nameT);
        $manager->persist($trip10);

        $trip11 = new Trip();
        $trip11->setUserTrip($manager->merge($this->getReference('user11')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+6 days'))
            ->setDepartureTime(new \DateTime('+15 hours'))
            ->setCityDestination('Bordeaux')
            ->setDateArrival($trip11->getDateDeparture())
            ->setTimeArrival(new \DateTime('+6 hours'))
            ->setNumberPlaces(3)
            ->setPlaceAvailable($trip11->getNumberPlaces())
            ->setPrice(17);
        $nameT = $trip11->getCityDeparture()." - ".$trip11->getCityDestination();
        $trip11->setNameTrip($nameT);
        $manager->persist($trip11);

        $trip12 = new Trip();
        $trip12->setUserTrip($manager->merge($this->getReference('user12')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+5 days'))
            ->setDepartureTime(new \DateTime('+7 hours'))
            ->setCityDestination('Bordeaux')
            ->setDateArrival($trip12->getDateDeparture())
            ->setTimeArrival(new \DateTime('+8 hours'))
            ->setNumberPlaces(3)
            ->setPlaceAvailable($trip12->getNumberPlaces())
            ->setPrice(7);
        $nameT = $trip12->getCityDeparture()." - ".$trip12->getCityDestination();
        $trip12->setNameTrip($nameT);
        $manager->persist($trip12);

        $trip13 = new Trip();
        $trip13->setUserTrip($manager->merge($this->getReference('user13')))
            ->setCityDeparture('Nantes')
            ->setDateDeparture(new \DateTime('+5 days'))
            ->setDepartureTime(new \DateTime('+7 hours'))
            ->setCityDestination('Bordeaux')
            ->setDateArrival($trip13->getDateDeparture())
            ->setTimeArrival(new \DateTime('+8 hours'))
            ->setNumberPlaces(3)
            ->setPlaceAvailable($trip13->getNumberPlaces())
            ->setPrice(7);
        $nameT = $trip13->getCityDeparture()." - ".$trip13->getCityDestination();
        $trip13->setNameTrip($nameT);
        $manager->persist($trip13);


        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            UserFixtures::class
        ];
    }
}
