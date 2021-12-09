<?php

namespace App\Entity;

use App\Repository\SalaryTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalaryTypeRepository::class)
 */
class SalaryType
{
   private const SALARY_TYPE_RUS = [
      'accrued' => 'начислено',
        'payed' => 'выплачено'
    ];


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\OneToMany(targetEntity=Salary::class, mappedBy="salary_type")
     */
    private ArrayCollection $salaries;

    public function __construct()
    {
        $this->salaries = new ArrayCollection();
    }

    public function __toString():string
    {
        return self::SALARY_TYPE_RUS[$this->getName()];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getSalaries(): Collection
    {
        return $this->salaries;
    }

    public function addSalary(Salary $salary): self
    {
        if (!$this->salaries->contains($salary)) {
            $this->salaries[] = $salary;
            $salary->setSalaryType($this);
        }

        return $this;
    }

    public function removeSalary(Salary $salary): self
    {
        if ($this->salaries->removeElement($salary)) {
            // set the owning side to null (unless already changed)
            if ($salary->getSalaryType() === $this) {
                $salary->setSalaryType(null);
            }
        }

        return $this;
    }
}
