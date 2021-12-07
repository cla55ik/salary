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
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $sum;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="moneyMoves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pay_owner;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="moneyMoves")
     */
    private $pay_recipient;

    /**
     * @ORM\ManyToOne(targetEntity=Salary::class, inversedBy="money_move")
     */
    private $salary;

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
}
