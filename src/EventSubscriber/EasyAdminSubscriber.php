<?php

namespace App\EventSubscriber;

use App\Entity\Contract;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{


    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => ['setContractDeadlineDate'],
        ];
    }

    /**
     * @throws \Exception
     */
    public function setContractDeadlineDate(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();
        if (!$entity instanceof Contract){
            return;
        }

        $period = (int)$entity->getPeriod() + 2;
        $createdAt = $entity->getCreatedAt();
        $tmpDate = clone $createdAt;
        $tmpDate->modify("+{$period} day");
        $entity->setDeadlineAt($tmpDate);

    }
}