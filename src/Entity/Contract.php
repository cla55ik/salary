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
    private $pruduct_sum;

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

    public function getPruductSum(): ?float
    {
        return $this->pruduct_sum;
    }

    public function setPruductSum(float $pruduct_sum): self
    {
        $this->pruduct_sum = $pruduct_sum;

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
}
