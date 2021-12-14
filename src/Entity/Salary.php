<?php

namespace App\Entity;

use App\Repository\SalaryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalaryRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Salary
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=SalaryType::class, inversedBy="salaries")
     */
    private ?SalaryType $salary_type;

    /**
     * @ORM\ManyToOne(targetEntity=Employees::class, inversedBy="salaries")
     */
    private ?Employees $employee;

    /**
     * @ORM\Column (type="float")
     */
    private ?float $sum;

    /**
     * @ORM\OneToMany(targetEntity=MoneyMove::class, mappedBy="salary")
     */
    private $money_move;

    /**
     * @ORM\ManyToOne(targetEntity=Contract::class, inversedBy="salaries")
     */
    private ?Contract $contract;

    public function __construct()
    {
        $this->money_move = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getSum();
    }

    /**
     * @ORM\PrePersist()
     * @return void
     */
    public function setCreatedAtValue():void
    {
        $this->created_at = new \DateTimeImmutable();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getSalaryType(): ?SalaryType
    {
        return $this->salary_type;
    }

    public function setSalaryType(?SalaryType $salary_type): self
    {
        $this->salary_type = $salary_type;

        return $this;
    }

    public function getEmployee(): ?Employees
    {
        return $this->employee;
    }

    public function setEmployee(?Employees $employee): self
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSum(): ?float
    {
        return $this->sum;
    }

    /**
     * @param float|null $sum
     */
    public function setSum(?float $sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return Collection|MoneyMove[]
     */
    public function getMoneyMove(): Collection
    {
        return $this->money_move;
    }

    public function addMoneyMove(MoneyMove $moneyMove): self
    {
        if (!$this->money_move->contains($moneyMove)) {
            $this->money_move[] = $moneyMove;
            $moneyMove->setSalary($this);
        }

        return $this;
    }

    public function removeMoneyMove(MoneyMove $moneyMove): self
    {
        if ($this->money_move->removeElement($moneyMove)) {
            // set the owning side to null (unless already changed)
            if ($moneyMove->getSalary() === $this) {
                $moneyMove->setSalary(null);
            }
        }

        return $this;
    }

    public function getContract(): ?Contract
    {
        return $this->contract;
    }

    public function setContract(?Contract $contract): self
    {
        $this->contract = $contract;

        return $this;
    }

}
