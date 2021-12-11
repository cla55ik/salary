<?php

namespace App\Repository;

use App\Entity\EmployeesPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmployeesPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeesPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeesPost[]    findAll()
 * @method EmployeesPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeesPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeesPost::class);
    }

    // /**
    //  * @return EmployeesPost[] Returns an array of EmployeesPost objects
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
    public function findOneBySomeField($value): ?EmployeesPost
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
