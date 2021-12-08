<?php

namespace App\Entity;

use App\Repository\ContractRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContractRepository::class)
 */
class Contract
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_done;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contract_num;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $deadline_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $period;

    /**
     * @ORM\Column(type="float")
     */
    private $product_sum;

    /**
     * @ORM\Column(type="float")
     */
    private $additional_sum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $product_work_sum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $additional_work_sum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $product_area;

    /**
     * @ORM\Column(type="integer", nullable=true, unique=true)
     */
    private $product_num;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $slopes_length;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $slopes_width;

    /**
     * @ORM\ManyToOne(targetEntity=Employees::class, inversedBy="contracts")
     */
    private $worker_employee;

    /**
     * @ORM\Column(type="float")
     */
    private $sum;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cost_product;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cost_additional;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cost_another;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cost_all;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $earning;

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

    public function getWorkerEmployee(): ?Employees
    {
        return $this->worker_employee;
    }

    public function setWorkerEmployee(?Employees $worker_employee): self
    {
        $this->worker_employee = $worker_employee;

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
}
