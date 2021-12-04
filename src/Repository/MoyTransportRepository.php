<?php

namespace App\Repository;

use App\Entity\MoyTransport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MoyTransport|null find($id, $lockMode = null, $lockVersion = null)
 * @method MoyTransport|null findOneBy(array $criteria, array $orderBy = null)
 * @method MoyTransport[]    findAll()
 * @method MoyTransport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoyTransportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MoyTransport::class);
    }

    // /**
    //  * @return MoyTransport[] Returns an array of MoyTransport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MoyTransport
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
