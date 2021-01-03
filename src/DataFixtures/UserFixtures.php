<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user1 = new User();
        $user1->setFirstName('ZINEDINE')
              ->setLastName('Zidane')
              ->setPhoneNumber('0658980988')
              ->setEmail('zz@ffff.fr')
              ->setPassword($this->passwordEncoder->encodePassword($user1, 'zinedine'))
              ->setTown('Bordeaux')
              ->setStreet('4 Boulevard Générale De Gaule')
              ->setPostCode('34566');
        $manager->persist($user1);

        $user2 = new User();
        $user2->setFirstName('MANE')
            ->setLastName('Sadio')
            ->setPhoneNumber('0858900978')
            ->setEmail('mane@lfc.com')
            ->setPassword($this->passwordEncoder->encodePassword($user2, 'mane'))
            ->setTown('Metz')
            ->setStreet('1 Rue Marie Curie')
            ->setPostCode('90876');
        $manager->persist($user2);

        $user3 = new User();
        $user3->setFirstName('BLANC')
            ->setLastName('Laurent')
            ->setPhoneNumber('+189750975')
            ->setEmail('laurent@lfc.com')
            ->setPassword($this->passwordEncoder->encodePassword($user3, 'laurent'))
            ->setTown('Liverpool')
            ->setStreet('1 rue Mickel OWEN')
            ->setPostCode('90876');
        $manager->persist($user3);

        $user4 = new User();
        $user4->setFirstName('PETIT')
            ->setLastName('Emmanuel')
            ->setPhoneNumber('+189900675')
            ->setEmail('petit@lfc.com')
            ->setPassword($this->passwordEncoder->encodePassword($user4, 'petit'))
            ->setTown('Arsenal')
            ->setStreet('7 place Wayne Rooney')
            ->setPostCode('70876');
        $manager->persist($user4);


        $user5 = new User();
        $user5->setFirstName('BARTHEZ')
            ->setLastName('Fabien')
            ->setPhoneNumber('+189900675')
            ->setEmail('fabien@cfc.com')
            ->setPassword($this->passwordEncoder->encodePassword($user5, 'fabien'))
            ->setTown('Toulouse')
            ->setStreet('1 Road John Terry')
            ->setPostCode('19876');
        $manager->persist($user5);

        $user6 = new User();
        $user6->setFirstName('VIERRA')
            ->setLastName('Patrick')
            ->setPhoneNumber('+193900675')
            ->setEmail('patrick@cfc.com')
            ->setPassword($this->passwordEncoder->encodePassword($user6, 'vierra'))
            ->setTown('Nice')
            ->setStreet('2 Road Queen Elisabeth')
            ->setPostCode('16776');
        $manager->persist($user6);

        $user7 = new User();
        $user7->setFirstName('HENRY')
            ->setLastName('Thierry')
            ->setPhoneNumber('+165900675')
            ->setEmail('henry@arsenal.com')
            ->setPassword($this->passwordEncoder->encodePassword($user7, 'thierry'))
            ->setTown('Arsenal')
            ->setStreet('2 Road Arsene Wenger')
            ->setPostCode('10776');
        $manager->persist($user7);

        $user8 = new User();
        $user8->setFirstName('DESAILY')
            ->setLastName('Marcel')
            ->setPhoneNumber('+625900675')
            ->setEmail('marcel@arsenal.com')
            ->setPassword($this->passwordEncoder->encodePassword($user8, 'desaily'))
            ->setTown('Nantes')
            ->setStreet('2 Rue de la Chevalerie')
            ->setPostCode('44300');
        $manager->persist($user8);

        $user9 = new User();
        $user9->setFirstName('LE LOUP')
            ->setLastName('Jean')
            ->setPhoneNumber('+625900675')
            ->setEmail('jean@gmail.com')
            ->setPassword($this->passwordEncoder->encodePassword($user9, 'leloup'))
            ->setTown('Bordeaux')
            ->setStreet('2 Rue de la Chevalerie')
            ->setPostCode('35300');
        $manager->persist($user9);

        $user10 = new User();
        $user10->setFirstName('KABA')
            ->setLastName('Mariame')
            ->setPhoneNumber('+625987675')
            ->setEmail('kaba@gmail.com')
            ->setPassword($this->passwordEncoder->encodePassword($user10, 'kaba'))
            ->setTown('Nantes')
            ->setStreet('8 Rue de la Bourgeonniere')
            ->setPostCode('44300');
        $manager->persist($user10);

        $user11 = new User();
        $user11->setFirstName('Barry')
            ->setLastName('Hassance')
            ->setPhoneNumber('+625987075')
            ->setEmail('bh@gmail.com')
            ->setPassword($this->passwordEncoder->encodePassword($user11, 'hassane'))
            ->setTown('Nantes')
            ->setStreet('3 Rue Vincent Scotto')
            ->setPostCode('44300');
        $manager->persist($user11);

        $user12 = new User();
        $user12->setFirstName('Le Coq')
            ->setLastName('Vince')
            ->setPhoneNumber('+625987075')
            ->setEmail('lcp@gmail.com')
            ->setPassword($this->passwordEncoder->encodePassword($user12, 'lecop'))
            ->setTown('Nantes')
            ->setStreet('6 Rue Vincent Scotto')
            ->setPostCode('44300');
        $manager->persist($user12);

        $user13 = new User();
        $user13->setFirstName('BROU')
            ->setLastName('Christian')
            ->setPhoneNumber('+625980675')
            ->setEmail('brou@gmail.com')
            ->setPassword($this->passwordEncoder->encodePassword($user13, 'broux'))
            ->setTown('Nantes')
            ->setStreet('2 Rue de la Bourgeonniere')
            ->setPostCode('44300');
        $manager->persist($user13);

        $manager->flush();


        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
        $this->addReference('user3', $user3);
        $this->addReference('user4', $user4);
        $this->addReference('user5', $user5);
        $this->addReference('user6', $user6);
        $this->addReference('user7', $user7);
        $this->addReference('user8', $user8);
        $this->addReference('user9', $user9);
        $this->addReference('user10', $user10);
        $this->addReference('user11', $user11);
        $this->addReference('user12', $user12);
        $this->addReference('user13', $user13);
    }
}
