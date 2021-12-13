<?php

namespace App\Service;

use App\Entity\Salary;
use Doctrine\ORM\EntityManagerInterface;

class SalaryService
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param int $contract_id
     * @return bool
     */
    public function isSalaryIssetByContract(int $contract_id):bool
    {
        return !$this->em->getRepository(Salary::class)->findOneBy(['contract'=>$contract_id]);
    }

}