<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('users')]
#[ORM\HasLifecycleCallbacks]

class User {
  #[ORM\Id]
  #[ORM\Column, ORM\GeneratedValue]
  private int $id;

  #[ORM\Column]
  private string $email;

  #[ORM\Column(name: 'full_name')]
  private string $fullName;

  #[ORM\Column(name: 'is_active')]
  private int $isActive;

  #[ORM\Column(name: 'created_at')]
  private \DateTime $createdAt;

  // mappedBy 對應到 App\Entity\Invoice 的 private User $user;
  #[ORM\OneToMany(targetEntity: Invoice::class, mappedBy: 'user')]
  private Collection $invoices;

  public function __construct() {
    $this->invoices = new ArrayCollection();
  }

  #[ORM\PrePersist]
  public function onPrePersist(PrePersistEventArgs $args) {
    $this->createdAt = new \DateTime(timezone: new \DateTimeZone('Asia/Taipei'));
  }

  public function getId(): int {
    return $this->id;
  }

  public function setId(int $id): User {
    $this->id = $id;

    return $this;
  }

  public function getFullName(): string {
    return $this->fullName;
  }

  public function setFullName(string $fullName): User {
    $this->fullName = $fullName;

    return $this;
  }

  public function getEmail(): string {
    return $this->email;
  }

  public function setEmail(string $email): User {
    $this->email = $email;

    return $this;
  }

  public function getIsActive(): int {
    return $this->isActive;
  }

  public function setIsActive(int $isActive): User {
    $this->isActive = $isActive;

    return $this;
  }

  public function getCreatedAt(): \DateTime {
    return $this->createdAt;
  }

  public function getInvoice(): Collection {
    return $this->invoices;
  }


  public function addInvoice(Invoice $invoice) {
    $invoice->setUser($this);

    $this->invoices->add($invoice);

    return $this;
  }
}
