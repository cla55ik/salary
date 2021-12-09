<?php

namespace App\Entity;

use App\Repository\MoneyMoveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MoneyMoveRepository::class)
 */
class MoneyMove
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $sum;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="moneyMoves")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Company $pay_owner;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="moneyMoves")
     */
    private ?Company $pay_recipient;

    /**
     * @ORM\ManyToOne(targetEntity=Salary::class, inversedBy="money_move")
     */
    private ?Salary $salary;



    /**
     * @ORM\ManyToOne(targetEntity=Purpose::class, inversedBy="moneyMoves")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Purpose $purpose;


    /**
     * @ORM\ManyToOne(targetEntity=MoneyMoveType::class, inversedBy="moneyMove")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?MoneyMoveType $money_move_type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSum(): ?float
    {
        return $this->sum;
    }

    public function setSum(float $sum): self
    {
        $this->sum = $sum;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getPayOwner(): ?Company
    {
        return $this->pay_owner;
    }

    public function setPayOwner(?Company $pay_owner): self
    {
        $this->pay_owner = $pay_owner;

        return $this;
    }

    public function getPayRecipient(): ?Company
    {
        return $this->pay_recipient;
    }

    public function setPayRecipient(?Company $pay_recipient): self
    {
        $this->pay_recipient = $pay_recipient;

        return $this;
    }

    public function getSalary(): ?Salary
    {
        return $this->salary;
    }

    public function setSalary(?Salary $salary): self
    {
        $this->salary = $salary;

        return $this;
    }


    public function getPurpose(): ?Purpose
    {
        return $this->purpose;
    }

    public function setPurpose(?Purpose $purpose): self
    {
        $this->purpose = $purpose;

        return $this;
    }



    public function getMoneyMoveType(): ?MoneyMoveType
    {
        return $this->money_move_type;
    }

    public function setMoneyMoveType(?MoneyMoveType $money_move_type): self
    {
        $this->money_move_type = $money_move_type;

        return $this;
    }


}
