<?php

namespace App\Repository;

use App\Entity\Trip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @method Trip|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trip|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trip[]    findAll()
 * @method Trip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TripRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trip::class);
    }

    /**
     * @return Trip[]
     */
    public function getUnexpiredTrips(){

        $qb = $this->createQueryBuilder('t')
            ->where('t.dateDeparture > :date')
            ->setParameter('date', new \DateTime())
            ->orderBy('t.dateDeparture', 'DESC');
        return $qb->getQuery()->getResult();
    }

    /**
     * @return Trip[]
     */
    public function getSameNametrip(Trip $trip){

        $qb = $this->createQueryBuilder('t')
            ->where('t.dateDeparture >= :date')
            ->setParameter('date', $trip->getDepartureTime())
            ->andWhere('t.nameTrip = :name')
            ->andWhere('t.id != :cle')
            ->setParameter('cle', $trip->getId())
            ->setParameter('name', $trip->getNameTrip())
            ->orderBy('t.dateDeparture', 'DESC');
        return $qb->getQuery()->getResult();
    }

    /**
     * @param String $s
     * @return int|mixed|string
     */
    public function getIdUser(String $s){
        $qb = $this->createQueryBuilder('u.id')
            ->where('u.email = :user')
            ->setParameter('user', $s);
        return $qb->getQuery()->getResult();


    }

    /**
     * @param Integer $id
     * @return Trip[]
     */
    public function getAUsersTripExecute(int $id){

        $qb = $this->createQueryBuilder('t')
            ->where('t.userTrip = :idUser')
            ->setParameter('idUser', $id)
            ->andWhere('t.dateDeparture >= :date')
            ->setParameter('date', new \DateTime())
            ->orderBy('t.dateDeparture', 'ASC');

        dump($id);
        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return Trip[] Returns an array of Trip objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Trip
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
