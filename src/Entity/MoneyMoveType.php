<?php

namespace App\Entity;

use App\Repository\MoneyMoveTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MoneyMoveTypeRepository", repositoryClass=MoneyMoveTypeRepository::class)
 */
class MoneyMoveType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $name;


    /**
     * @ORM\OneToMany(targetEntity=MoneyMove::class, mappedBy="money_move_type", orphanRemoval=true)
     */
    private ArrayCollection $moneyMove;

    #[Pure] public function __construct()
    {
        $this->moneyMove = new ArrayCollection();
    }

    public function __toString():string
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

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function addMoneyMove(MoneyMove $moneyMove): self
    {
        if (!$this->moneyMoves->contains($moneyMove)) {
            $this->moneyMoves[] = $moneyMove;
            $moneyMove->setMoveType($this);
        }

        return $this;
    }

    public function removeMoneyMove(MoneyMove $moneyMove): self
    {
        if ($this->moneyMoves->removeElement($moneyMove)) {
            // set the owning side to null (unless already changed)
            if ($moneyMove->getMoveType() === $this) {
                $moneyMove->setMoveType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection
     */
    public function getMoneyMove(): Collection
    {
        return $this->moneyMove;
    }
}
