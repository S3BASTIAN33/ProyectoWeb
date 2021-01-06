<?php

namespace App\Repository;

use App\Entity\Hospitales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Expr\Value;
use Doctrine\ORM\Query\Expr\Select;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hospitales|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hospitales|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hospitales[]    findAll()
 * @method Hospitales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HospitalesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hospitales::class);
    }

    // /**
    //  * @return Hospitales[] Returns an array of Hospitales objects
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
    public function findOneBySomeField($value): ?Hospitales
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
       /* $qb= $this->createQueryBuilder('p');
        $qb
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->orX(
                        $qb->expr()->like('p.nombre', ':enf')
                    )
                )
            )
            ->setParameter('enf', '%' . $enf .'%');
                    
        return $this->$qb->getQuery()->getResult();*/

}
