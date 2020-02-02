<?php

namespace App\Repository;

use App\Entity\Mesprojets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Mesprojets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mesprojets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mesprojets[]    findAll()
 * @method Mesprojets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MesprojetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mesprojets::class);
    }

    // /**
    //  * @return Mesprojets[] Returns an array of Mesprojets objects
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
    public function findOneBySomeField($value): ?Mesprojets
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
