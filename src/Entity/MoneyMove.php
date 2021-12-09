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




}
