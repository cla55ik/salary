<?php

namespace App\EventSubscriber;

use App\Entity\Contract;
use App\Service\RecalculateContractService;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Exception;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private const SUM_FOR_PRODUCT_SQUARE_MATTER_MONTAGE = 450;
    private const SUM_FOR_SLOPE_LINE_MATTER_MONTAGE = [
      '200'=>400,
      '300'=>450,
      '400'=>500,
      '500'=>600
    ];

    private RecalculateContractService $contractService;

    public function __construct(RecalculateContractService $contractService)
    {
        $this->contractService = $contractService;
    }


    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => ['beforeEntityPersist'],
            BeforeEntityUpdatedEvent::class => ['beforeEntityUpdate'],
        ];
    }

    /**
     * @throws Exception
     */
    public function beforeEntityPersist(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();
        if (!$entity instanceof Contract){
            return;
        }
        $this->recalculateCost($entity);
    //create deadline date



    }

    /**
     * @param BeforeEntityUpdatedEvent $event
     * @return void
     */
    public function beforeEntityUpdate(BeforeEntityUpdatedEvent $event):void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Contract){
            return;
        }

        $this->recalculateCost($entity);
        $this->setDeadlineDate($entity);
        $this->setProductWorkingSum($entity);


    }

    /**
     * @param $entity
     * @return void
     */
    private function recalculateCost($entity):void
    {
        $cost_all = $entity->getCostProduct()+$entity->getCostAdditional()+$entity->getCostAnother();
        $entity->setCostAll($cost_all);

        $sum_all = $entity->getProductSum()+$entity->getAdditionalSum()+$entity->getAdditionalSum()+$entity->getProductWorkSum()+$entity->getAdditionalSum();
        $entity->setSum($sum_all);

    }

    /**
     * @param $entity
     * @return void
     */
    private function setDeadlineDate($entity):void
    {
        $period = (int)$entity->getPeriod() + 2;
        $createdAt = $entity->getCreatedAt();
        $tmpDate = clone $createdAt;
        $tmpDate->modify("+{$period} day");
        $entity->setDeadlineAt($tmpDate);
    }

    /**
     * @param $entity
     * @return void
     */
    private function setProductWorkingSum($entity):void
    {
        $entity->setProductWorkSum($entity->getProductArea() * self::SUM_FOR_PRODUCT_SQUARE_MATTER_MONTAGE);
    }

    /**
     * @param $entity
     * @return void
     */
    private function setSlopeWorkingSum($entity):void
    {

    }

}