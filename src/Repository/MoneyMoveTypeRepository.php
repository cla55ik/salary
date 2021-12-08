<?php

namespace App\Repository;

use App\Entity\MoneyMoveType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MoneyMoveType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MoneyMoveType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MoneyMoveType[]    findAll()
 * @method MoneyMoveType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoneyMoveTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MoneyMoveType::class);
    }

    // /**
    //  * @return MoneyMoveType[] Returns an array of MoneyMoveType objects
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
    public function findOneBySomeField($value): ?MoneyMoveType
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
