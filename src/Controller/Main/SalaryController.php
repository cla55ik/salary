<?php

namespace App\Controller\Main;

use App\Entity\Contract;
use App\Entity\Salary;
use App\Entity\SalaryType;
use App\Service\SalaryService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SalaryController extends AbstractController
{

    private EntityManagerInterface $em;
    private SalaryService $salaryService;

    public function __construct(EntityManagerInterface $em, SalaryService $salaryService)
    {
        $this->em = $em;
        $this->salaryService = $salaryService;
    }

    /**
     * @Route ("/salary/create/{contract_id}", name="create_salary")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function createSalaryByContract(Request $request, EntityManagerInterface $em): Response
    {
        $contract = $em->getRepository(Contract::class)->find($request->get('contract_id'));

        if($contract == null){
            $this->addFlash(
                'notice',
                'Contract is empty'
            );
            return $this->redirectToRoute('contract');
        }

        if(!$this->salaryService->isSalaryIssetByContract($contract->getId())){
            $this->addFlash(
                'notice',
                'Salary is already exists'
            );
            return $this->redirectToRoute('contract');
        }



        $employee_id = $contract->getEmployeeWorker();
        $sum = $contract->getSumSlopeWork() + $contract->getProductWorkSum()+$contract->getAdditionalWorkSum();
        $salary_type = $em->getRepository(SalaryType::class)->find('2');

        $salary = new Salary();
        $salary->setSalaryType($salary_type);
        $salary->setEmployee($employee_id);
        $salary->setContract($contract);
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