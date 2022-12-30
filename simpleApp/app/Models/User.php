<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use DateTime;
use DateTimeZone;

class User extends Model {
  public function create(string $email, string $name, bool $isActive = true): int {
    $currentTime = new DateTime(timezone: new DateTimeZone('Asia/Taipei'));

    $stmt = $this->db->prepare(
      'INSERT INTO users (email, full_name, is_active, created_at)
      VALUES (:email, :name, :isActive, :createdAt)'
    );

    $stmt->execute([
      'email' => $email,
      'name' => $name,
      'isActive' => $isActive,
      'createdAt' => $currentTime->format('Y-m-d H:i:s')
    ]);

    return (int) $this->db->lastInsertId();
  }
}
