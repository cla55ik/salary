<?php

namespace App\Entity;

use App\Repository\PaymentTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentTypeRepository::class)
 */
class PaymentType
{

    private const PAYMENT_NAME_TO_RUS = [
      'cash'=>'наличные',
        'terminal'=>'терминал',
        'instalment'=>'рассрочка',
        'card'=>'карта'
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
        return self::PAYMENT_NAME_TO_RUS[$this->getName()];
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
