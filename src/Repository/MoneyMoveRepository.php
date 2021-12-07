<?php

namespace App\Repository;

use App\Entity\MoneyMove;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MoneyMove|null find($id, $lockMode = null, $lockVersion = null)
 * @method MoneyMove|null findOneBy(array $criteria, array $orderBy = null)
 * @method MoneyMove[]    findAll()
 * @method MoneyMove[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoneyMoveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MoneyMove::class);
    }

    // /**
    //  * @return MoneyMove[] Returns an array of MoneyMove objects
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
    public function findOneBySomeField($value): ?MoneyMove
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
