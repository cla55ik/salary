<?php

namespace App\Service;

use App\Entity\Contract;
use App\Entity\MoneyMove;
use App\Entity\MoneyMoveType;
use App\Entity\Purpose;
use Doctrine\ORM\EntityManagerInterface;

class MoneyService
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createMoneyMovePayment(Contract $contract)
    {
        $money = new MoneyMove();
        $money->setCreatedAt(new \DateTime());
        $money->setSum($contract->getPrepayment());
        $money->setPurpose($this->em->getRepository(Purpose::class)->findOneBy(['name'=>'payment']));
        $money->setMoneyOwner($contract->getOwner());
        $money->setMoneyMoveType($this->em->getRepository(MoneyMoveType::class)->findOneBy(['name'=>'entry']));
        $this->em->persist($money);
        $this->em->flush();

    }

}