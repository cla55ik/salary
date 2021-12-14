<?php

namespace App\Service;

use App\Entity\Employees;
use App\Entity\EmployeesPost;
use App\Entity\MoneyMoveType;
use App\Entity\Profile;
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

    private const PROFILE = [
      'Veka',
      'Rehau',
      'Al',
      'Novotex',
      'KBE'
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

    public function createTestEmployees()
    {
        $employees = $this->entityManager->getRepository(Employees::class);
        $employee_post = $this->entityManager->getRepository(EmployeesPost::class);
        foreach (self::EMPLOYEE_POST as $post_name){
            $post=$employee_post->findOneBy(['post'=>$post_name]);
//            dd($post);

            for ($i=1; $i<6; $i++){
                $employee_name = ucfirst($post_name) . $i;
                $employee = new Employees();
                $employee->setEmployeePost($post);
                $employee->setName($employee_name);
                $employee->setIsActive(true);

                $this->entityManager->persist($employee);
                $this->entityManager->flush();
            }
        }

    }

    public function createTestProfiles()
    {
        $profiles = $this->entityManager->getRepository(Profile::class);
        foreach (self::PROFILE as $profile_name){
            if (!$profiles->findOneBy(['name'=>$profile_name])){
                $profile = new Profile();
                $profile->setName($profile_name);
                $this->entityManager->persist($profile);
                $this->entityManager->flush();
            }
        }
    }

}