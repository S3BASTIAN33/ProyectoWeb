<?php

namespace App\Repository;

use App\Entity\Hospcat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hospcat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hospcat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hospcat[]    findAll()
 * @method Hospcat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HospcatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hospcat::class);
    }

    // /**
    //  * @return Hospcat[] Returns an array of Hospcat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hospcat
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
  
}
