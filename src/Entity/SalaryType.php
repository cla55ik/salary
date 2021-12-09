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



}
