<?php

namespace App\Service;

use App\Entity\Salary;
use Doctrine\ORM\EntityManagerInterface;

class ContractService
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    /**
     * @param int $contract_id
     * @return void
     */
    public function sumSalaryByContract(int $contract_id):void
    {
        $salary = $this->em->getRepository(Salary::class)->findBy(["contract"=>$contract_id]);
        dd('salary');

    }


}