<?php

namespace App\Repository;

use App\Entity\Enfermedades;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Enfermedades|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enfermedades|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enfermedades[]    findAll()
 * @method Enfermedades[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnfermedadesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enfermedades::class);
    }

    // /**
    //  * @return Enfermedades[] Returns an array of Enfermedades objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Enfermedades
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function busenf(string $enf, string $ubi){
        return $this->getEntityManager()
        ->createQuery("SELECT  ho.nombre as Hospital, ho.direccion, ho.telefono, ho.Ubicacion as Ciudad, e.nombre as enfermedad, h.Ingresados As Ingresados
                        FROM App:Enfermedades e 
                        join e.categoria c
                        join c.hospcats h
                        join h.hospital ho
                        where e.nombre like :enf 
                        and ho.Ubicacion like :ubi ")
                        ->setParameter('enf','%'.$enf.'%')
                       ->setParameter('ubi','%'.$ubi.'%')
                        ->getResult()
                        ;
    }

    
}
