<?php

namespace App\Repository;

use App\Entity\ChildEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChildEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChildEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChildEntity[]    findAll()
 * @method ChildEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChildEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChildEntity::class);
    }

    // /**
    //  * @return ChildEntity[] Returns an array of ChildEntity objects
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
    public function findOneBySomeField($value): ?ChildEntity
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
