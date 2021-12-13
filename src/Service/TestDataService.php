<?php

namespace App\Service;

use App\Entity\EmployeesPost;
use App\Entity\MoneyMoveType;
use App\Entity\SalaryType;
use Doctrine\ORM\EntityManagerInterface;

class TestDataService
{
    private const SALARY_TYPE_RUS = [
        'accrued' => 'начислено',
        'payed' => 'выплачено'
    ];

    private const MONEY_MOVE_TYPE = [
      'cost',
        'entry'
    ];

    private const EMPLOYEE_POST = [
      'manager',
      'montage',
      'measuring'
    ];

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return void
     */
    public function createTestSalaryType(): void
    {
        $salary_type_repo = $this->entityManager->getRepository(SalaryType::class);

        foreach (self::SALARY_TYPE_RUS as $key=>$value){
            if (!$salary_type_repo->findBy(['name'=>$key])){
                $salary_type = new SalaryType();
                $salary_type->setName($key);
                $this->entityManager->persist($salary_type);
                $this->entityManager->flush();
            }
        }

    }

    public function createTestMoneyMoveType()
    {
        $money_move_type_repo = $this->entityManager->getRepository(MoneyMoveType::class);

        foreach (self::MONEY_MOVE_TYPE as $type){
            if (!$money_move_type_repo->findBy(['name'=>$type])){
                $money_type = new MoneyMoveType();
                $money_type->setName($type);
                $this->entityManager->persist($money_type);
                $this->entityManager->flush();
            }
        }

    }

    public function createTestEmployeePost()
    {
        $employee_post = $this->entityManager->getRepository(EmployeesPost::class);

        foreach ( self::EMPLOYEE_POST as $post_name) {
            if(!$employee_post->findBy(['post'=>$post_name])){
                $post = new EmployeesPost();
                $post->setPost($post_name);
                $this->entityManager->persist($post);
                $this->entityManager->flush();
            }
        }
    }

}