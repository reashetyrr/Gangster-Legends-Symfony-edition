<?php

namespace App\Repository;

use App\Entity\Crime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Crime|null find($id, $lockMode = null, $lockVersion = null)
 * @method Crime|null findOneBy(array $criteria, array $orderBy = null)
 * @method Crime[]    findAll()
 * @method Crime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CrimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Crime::class);
    }

    // /**
    //  * @return Crime[] Returns an array of Crime objects
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
    public function findOneBySomeField($value): ?Crime
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
