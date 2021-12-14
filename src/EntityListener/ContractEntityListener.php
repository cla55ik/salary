<?php

namespace App\EntityListener;

use App\Entity\Contract;
use App\Service\MoneyService;
use Doctrine\ORM\Event\LifecycleEventArgs;

class ContractEntityListener
{
    private const SUM_FOR_PRODUCT_SQUARE_MATTER_MONTAGE = 450;
    private const SUM_FOR_SLOPE_LINE_MATTER_MONTAGE = [
        200=>400,
        250=>450,
        300=>450,
        350=>500,
        450=>550,
        500=>600
    ];

    /**
     * @param Contract $contract
     * @param LifecycleEventArgs $event
     * @return void
     */
    public function prePersist(Contract $contract, LifecycleEventArgs $event):void
    {
        $contract->setIsDone(false);
        $this->setDeadlineDate($contract);
        $this->recalculateWorkSum($contract);
        $this->setDiscount($contract);
    }

    /**
     * @param Contract $contract
     * @param LifecycleEventArgs $event
     * @return void
     */
    public function preUpdate(Contract $contract, LifecycleEventArgs $event):void
    {
        $this->setDeadlineDate($contract);
        $this->recalculateWorkSum($contract);
        $this->setDiscount($contract);
    }

    /**
     * @param Contract $contract
     * @param LifecycleEventArgs $event
     * @return void
     */
    public function postUpdate(Contract $contract, LifecycleEventArgs $event) :void
    {
        //Don't need now
    }


    private function setDiscount(Contract $contract):void
    {
        $contract->setDiscount(ceil(($contract->getSum()/$contract->getBaseSum() - 1)*100*-1));
    }

    /**
     * @param Contract $contract
     * @return void
     */
    private function setDeadlineDate(Contract $contract):void
    {
        $period = (int)$contract->getPeriod() +2;
        $createdAt = $contract->getCreatedAt();
        $deadlineAt = clone $createdAt;
        $deadlineAt->modify("+{$period} day");

        $contract->setDeadlineAt($deadlineAt);
    }

    /**
     * @param Contract $contract
     * @return void
     */
    private function recalculateWorkSum(Contract $contract) : void
    {
        $montage = $contract->getProductArea() * self::SUM_FOR_PRODUCT_SQUARE_MATTER_MONTAGE;
        $slopes = $contract->getSlopesLength() * $this->getSlopeMontagePriceByWidth($contract->getSlopesWidth());

        $contract->setProductWorkSum($montage);
        $contract->setSumSlopeWork($slopes);
    }

    /**
     * @param Contract $contract
     * @return void
     */
    private function recalculateSum(Contract $contract){
        $contract->setSum($contract->getProductSum() + $contract->getAdditionalSum());
    }

    /**
     * @param int $slopeWidth
     * @return int
     *
     */
    private function getSlopeMontagePriceByWidth(int $slopeWidth):int
    {
        $array = self::SUM_FOR_SLOPE_LINE_MATTER_MONTAGE;
        $min_width = array_key_first($array);
        $max_width = array_key_last($array);

        if (array_key_exists(50 * round($slopeWidth/50,0), $array)){
            return $array[(50 * round($slopeWidth/50,0))];
        }

        if ($slopeWidth < $min_width){
            return $array[$min_width];
        }

        if($slopeWidth > $max_width){
            return $array[$max_width];
        }

        return 0;
    }

    /**
     * @param Contract $contract
     * @return void
     */
    private function recalculateCost(Contract $contract) : void
    {
        $contract->setCostAll($contract->getCostProduct() + $contract->getCostAdditional() + $contract->getProductWorkSum() + $contract->getAdditionalWorkSum() + $contract->getCostAnother() + $contract->getSumSlopeWork());
    }

    /**
     * @param Contract $contract
     * @return void
     */
    private function recalculateEarning(Contract $contract):void
    {
        $contract->setEarning($contract->getSum() - $contract->getCostAll());
    }



}