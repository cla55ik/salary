<?php

namespace App\EntityListener;

use App\Entity\Contract;
use Doctrine\ORM\Event\LifecycleEventArgs;

class ContractEntityListener
{
    public function prePersist(Contract $contract, LifecycleEventArgs $event)
    {
        $period = (int)$contract->getPeriod() +2;
        $createdAt = $contract->getCreatedAt();
        $deadlineAt = clone $createdAt;
        $deadlineAt->modify("+{$period} day");

        $contract->setDeadlineAt($deadlineAt);
    }

}