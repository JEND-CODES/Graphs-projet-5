<?php

namespace App\Repository;

use App\Entity\ChartData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ChartData|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChartData|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChartData[]    findAll()
 * @method ChartData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChartDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChartData::class);
    }

    // /**
    //  * @return ChartData[] Returns an array of ChartData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChartData
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
