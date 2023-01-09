<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $email
 * @property string $full_name
 * @property bool $is_active
 */
class User extends Model {
  const UPDATED_AT = null;

  public function invoices() {
    return $this->hasMany(Invoice::class);
  }
}
