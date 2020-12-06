<?php

namespace App\Repository;

use App\Entity\Saisons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Saisons|null find($id, $lockMode = null, $lockVersion = null)
 * @method Saisons|null findOneBy(array $criteria, array $orderBy = null)
 * @method Saisons[]    findAll()
 * @method Saisons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SaisonsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Saisons::class);
    }

    // /**
    //  * @return Saisons[] Returns an array of Saisons objects
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
    public function findOneBySomeField($value): ?Saisons
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
