<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository", repositoryClass=CompanyRepository::class)
 */
class Company
{
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
     * @ORM\OneToMany(targetEntity=MoneyMove::class, mappedBy="pay_owner")
     */
    private ArrayCollection $moneyMoves;

    public function __construct()
    {
        $this->moneyMoves = new ArrayCollection();
    }

    #[Pure] public function __toString():string
    {
        return $this->getName();
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
    public function getMoneyMoves(): Collection
    {
        return $this->moneyMoves;
    }

    public function addMoneyMove(MoneyMove $moneyMove): self
    {
        if (!$this->moneyMoves->contains($moneyMove)) {
            $this->moneyMoves[] = $moneyMove;
            $moneyMove->setPayOwner($this);
        }

        return $this;
    }

    public function removeMoneyMove(MoneyMove $moneyMove): self
    {
        if ($this->moneyMoves->removeElement($moneyMove)) {
            // set the owning side to null (unless already changed)
            if ($moneyMove->getPayOwner() === $this) {
                $moneyMove->setPayOwner(null);
            }
        }

        return $this;
    }
}
