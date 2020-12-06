<?php

namespace App\Repository;

use App\Entity\Alllegumes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Alllegumes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alllegumes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alllegumes[]    findAll()
 * @method Alllegumes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlllegumesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alllegumes::class);
    }

    // /**
    //  * @return Alllegumes[] Returns an array of Alllegumes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Alllegumes
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
