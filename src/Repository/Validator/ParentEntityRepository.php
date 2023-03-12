<?php

namespace App\Repository\Validator;

use App\Entity\Validator\ParentEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParentEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParentEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParentEntity[]    findAll()
 * @method ParentEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParentEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParentEntity::class);
    }

    // /**
    //  * @return ParentEntity[] Returns an array of ParentEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParentEntity
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
