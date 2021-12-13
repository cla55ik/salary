<?php

namespace App\Entity;

use App\Repository\ContractRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContractRepository::class)
 */
class Contract
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $is_done;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $contract_num;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $customer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $address;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $deadline_at;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $period;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $product_sum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $additional_sum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $product_work_sum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $additional_work_sum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $product_area;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $product_num;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $slopes_length;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $slopes_width;


    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $sum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $cost_product;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $cost_additional;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $cost_another;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $cost_all;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $earning;

    /**
     * @ORM\ManyToOne(targetEntity=Employees::class, inversedBy="contracts")
     */
    private $employee_worker;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $sum_slope_work;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="contracts")
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity=Salary::class, mappedBy="contract")
     */
    private $salaries;

    public function __construct()
    {
        $this->salaries = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getContractNum() . ' -> ' . $this->getOwner();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsDone(): ?bool
    {
        return $this->is_done;
    }

    public function setIsDone(bool $is_done): self
    {
        $this->is_done = $is_done;

        return $this;
    }

    public function getContractNum(): ?string
    {
        return $this->contract_num;
    }

    public function setContractNum(string $contract_num): self
    {
        $this->contract_num = $contract_num;

        return $this;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

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

    public function getDeadlineAt(): ?\DateTimeInterface
    {
        return $this->deadline_at;
    }

    public function setDeadlineAt(\DateTimeInterface $deadline_at): self
    {
        $this->deadline_at = $deadline_at;

        return $this;
    }

    public function getPeriod(): ?int
    {
        return $this->period;
    }

    public function setPeriod(int $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getProductSum(): ?float
    {
        return $this->product_sum;
    }

    public function setProductSum(float $product_sum): self
    {
        $this->product_sum = $product_sum;

        return $this;
    }

    public function getAdditionalSum(): ?float
    {
        return $this->additional_sum;
    }

    public function setAdditionalSum(float $additional_sum): self
    {
        $this->additional_sum = $additional_sum;

        return $this;
    }

    public function getProductWorkSum(): ?float
    {
        return $this->product_work_sum;
    }

    public function setProductWorkSum(?float $product_work_sum): self
    {
        $this->product_work_sum = $product_work_sum;

        return $this;
    }

    public function getAdditionalWorkSum(): ?float
    {
        return $this->additional_work_sum;
    }

    public function setAdditionalWorkSum(?float $additional_work_sum): self
    {
        $this->additional_work_sum = $additional_work_sum;

        return $this;
    }

    public function getProductArea(): ?float
    {
        return $this->product_area;
    }

    public function setProductArea(?float $product_area): self
    {
        $this->product_area = $product_area;

        return $this;
    }

    public function getProductNum(): ?int
    {
        return $this->product_num;
    }

    public function setProductNum(?int $product_num): self
    {
        $this->product_num = $product_num;

        return $this;
    }

    public function getSlopesLength(): ?float
    {
        return $this->slopes_length;
    }

    public function setSlopesLength(?float $slopes_length): self
    {
        $this->slopes_length = $slopes_length;

        return $this;
    }

    public function getSlopesWidth(): ?float
    {
        return $this->slopes_width;
    }

    public function setSlopesWidth(?float $slopes_width): self
    {
        $this->slopes_width = $slopes_width;

        return $this;
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

    public function getCostProduct(): ?float
    {
        return $this->cost_product;
    }

    public function setCostProduct(?float $cost_product): self
    {
        $this->cost_product = $cost_product;

        return $this;
    }

    public function getCostAdditional(): ?float
    {
        return $this->cost_additional;
    }

    public function setCostAdditional(?float $cost_additional): self
    {
        $this->cost_additional = $cost_additional;

        return $this;
    }

    public function getCostAnother(): ?float
    {
        return $this->cost_another;
    }

    public function setCostAnother(?float $cost_another): self
    {
        $this->cost_another = $cost_another;

        return $this;
    }

    public function getCostAll(): ?float
    {
        return $this->cost_all;
    }

    public function setCostAll(?float $cost_all): self
    {
        $this->cost_all = $cost_all;

        return $this;
    }

    public function getEarning(): ?float
    {
        return $this->earning;
    }

    public function setEarning(?float $earning): self
    {
        $this->earning = $earning;

        return $this;
    }

    public function getEmployeeWorker(): ?Employees
    {
        return $this->employee_worker;
    }

    public function setEmployeeWorker(?Employees $employee_worker): self
    {
        $this->employee_worker = $employee_worker;

        return $this;
    }

    public function getSumSlopeWork(): ?float
    {
        return $this->sum_slope_work;
    }

    public function setSumSlopeWork(?float $sum_slope_work): self
    {
        $this->sum_slope_work = $sum_slope_work;

        return $this;
    }

    public function getOwner(): ?Company
    {
        return $this->owner;
    }

    public function setOwner(?Company $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection|Salary[]
     */
    public function getSalaries(): Collection
    {
        return $this->salaries;
    }

    public function addSalary(Salary $salary): self
    {
        if (!$this->salaries->contains($salary)) {
            $this->salaries[] = $salary;
            $salary->setContract($this);
        }

        return $this;
    }

    public function removeSalary(Salary $salary): self
    {
        if ($this->salaries->removeElement($salary)) {
            // set the owning side to null (unless already changed)
            if ($salary->getContract() === $this) {
                $salary->setContract(null);
            }
        }

        return $this;
    }
}
