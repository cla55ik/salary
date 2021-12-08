<?php

namespace App\Service;

use App\Entity\Contract;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;

class RecalculateContractService
{
    private QueryBuilder $queryBuilder;
    private EntityManagerInterface $entityManager;

    public function __construct()
    {
//        $this->queryBuilder = $queryBuilder;
    }

    /**
     * @param Contract $contract
     * @return Contract
     */
    public function recalculateContract(Contract $contract):Contract
    {
        $sum_cost = $contract->getCostProduct() + $contract->getCostAdditional() + $contract->getCostAnother();
        $sum_contract = $contract->getAdditionalSum() + $contract->getProductSum() + $contract->getAdditionalWorkSum();

        $contract->setSum($sum_contract);
        $contract->setCostAll($sum_cost);

        return $contract;
    }



}