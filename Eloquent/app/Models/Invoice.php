<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $amount
 */
class Invoice extends Model {
  public $timestamps = false;

  public function user() {
    return $this->belongsTo(User::class);
  }
}
