<?php

namespace App\Controller\Main;

use App\Entity\Contract;
use App\Entity\Salary;
use App\Entity\SalaryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SalaryController extends AbstractController
{

    /**
     * @Route ("/salary/create/{contract_id}", name="create_salary")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function createSalaryByContract(Request $request, EntityManagerInterface $em): Response
    {
        $contract = $em->getRepository(Contract::class)->find($request->get('contract_id'));
        $employee_id = $contract->getEmployeeWorker();
        $sum = $contract->getSumSlopeWork() + $contract->getProductWorkSum()+$contract->getAdditionalWorkSum();
        $salary_type = $em->getRepository(SalaryType::class)->find('2');

        $salary = new Salary();
        $salary->setSalaryType($salary_type);
        $salary->setEmployee($employee_id);
        $salary->setSum($sum);
        $em->persist($salary);
        $em->flush();

        $this->addFlash(
            'notice',
            'Salary done'
        );

        return $this->redirectToRoute('contract');
    }
}