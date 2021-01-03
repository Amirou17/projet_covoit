<?php

namespace App\Repository;

use App\Entity\SearchTrip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SearchTrip|null find($id, $lockMode = null, $lockVersion = null)
 * @method SearchTrip|null findOneBy(array $criteria, array $orderBy = null)
 * @method SearchTrip[]    findAll()
 * @method SearchTrip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SearchTripRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SearchTrip::class);
    }

    // /**
    //  * @return SearchTrip[] Returns an array of SearchTrip objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SearchTrip
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
