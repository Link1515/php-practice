<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('invoices')]

class Invoice {
  #[ORM\Id]
  #[ORM\Column, ORM\GeneratedValue]
  private int $id;

  #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 4)]
  private float $amount;

  #[ORM\Column(name: 'user_id')]
  private int $userId;

  // setUser 會自動去 setUserId
  // inverseBy 對應到 App\Entity\User 的 private Collection $invoices
  #[ORM\ManyToOne(inversedBy: 'invoices')]
  private User $user;

  public function getId(): int {
    return $this->id;
  }

  public function setId(int $id): Invoice {
    $this->id = $id;

    return $this;
  }

  public function getAmount(): float {
    return $this->amount;
  }

  public function setAmount(float $amount): Invoice {
    $this->amount = $amount;

    return $this;
  }

  public function getUserId(): int {
    return $this->userId;
  }

  public function setUserId(int $userId): Invoice {
    $this->userId = $userId;

    return $this;
  }

  public function getUser(): User {
    return $this->user;
  }

  public function setUser(User $user): Invoice {
    $this->user = $user;

    return $this;
  }
}
