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

    private RecalculateContractService $contractService;

    public function __construct(RecalculateContractService $contractService)
    {
        $this->contractService = $contractService;
    }


    public static function getSubscribedEvents(): array
    {
//        return [
//            BeforeEntityPersistedEvent::class => ['beforeEntityPersist'],
//            BeforeEntityUpdatedEvent::class => ['beforeEntityUpdate'],
//        ];
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
        $this->setProductWorkingSum($entity);
        $this->recalculateCost($entity);

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




}