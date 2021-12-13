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
     * @ORM\ManyToOne(targetEntity=MoneyMoveType::class, inversedBy="moneyMoves")
     */
    private $money_move_type;

    /**
     * @ORM\ManyToOne(targetEntity=Salary::class, inversedBy="money_move")
     */
    private $salary;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class)
     */
    private $money_owner;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class)
     */
    private $money_payer;

    /**
     * @ORM\ManyToOne(targetEntity=Purpose::class)
     */
    private $purpose;


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

    public function getMoneyMoveType(): ?MoneyMoveType
    {
        return $this->money_move_type;
    }

    public function setMoneyMoveType(?MoneyMoveType $money_move_type): self
    {
        $this->money_move_type = $money_move_type;

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

    public function getMoneyOwner(): ?Company
    {
        return $this->money_owner;
    }

    public function setMoneyOwner(?Company $money_owner): self
    {
        $this->money_owner = $money_owner;

        return $this;
    }

    public function getMoneyPayer(): ?Company
    {
        return $this->money_payer;
    }

    public function setMoneyPayer(?Company $money_payer): self
    {
        $this->money_payer = $money_payer;

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




}
