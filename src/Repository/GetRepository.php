<?php

namespace App\Repository;

use App\Entity\Get;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Get|null find($id, $lockMode = null, $lockVersion = null)
 * @method Get|null findOneBy(array $criteria, array $orderBy = null)
 * @method Get[]    findAll()
 * @method Get[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Get::class);
    }

    // /**
    //  * @return Get[] Returns an array of Get objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Get
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
