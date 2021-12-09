<?php

namespace App\Entity;

use App\Repository\SalaryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalaryRepository::class)
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
     * @ORM\OneToMany(targetEntity=MoneyMove::class, mappedBy="salary")
     */
    private ArrayCollection $money_move;

    /**
     * @ORM\ManyToOne(targetEntity=Employees::class, inversedBy="salaries")
     */
    private ?Employees $employee;

    /**
     * @ORM\ManyToOne(targetEntity=SalaryType::class, inversedBy="salaries")
     */
    private ?SalaryType $salary_type;

    public function __construct()
    {
        $this->money_move = new ArrayCollection();
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

    /**
     * @return Collection
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

    public function getEmployee(): ?Employees
    {
        return $this->employee;
    }

    public function setEmployee(?Employees $employee): self
    {
        $this->employee = $employee;

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
}
