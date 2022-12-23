<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class Invoice extends Model {
  public function create(float $amount, int $userId): int {
    $stmt = $this->db->prepare(
      'INSERT INTO invoices (amount, user_id)
      VALUES (:amount, :user_id)'
    );

    $stmt->execute([
      'amount' => $amount,
      'user_id' => $userId,
    ]);

    return (int) $this->db->lastInsertId();
  }

  public function find(int $invoiceId): array {
    $stmt = $this->db->prepare(
      'SELECT invoices.id, amount, full_name 
      FROM invoices LEFT JOIN users ON user_id = users.id
      WHERE invoices.id = :id'
    );

    $stmt->execute([
      'id' => $invoiceId
    ]);

    $invoice = $stmt->fetch();

    return $invoice ? $invoice : [];
  }
}
