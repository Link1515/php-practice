<?php

declare(strict_types=1);

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/bootstrap.php';

// Manager::connection()->beginTransaction();
Capsule::connection()->transaction(function () {
  $user = new User();

  $user->email = 'dd808@aaa.com';
  $user->full_name = 'TUser996';
  $user->is_active = true;
  $user->save();

  $invoice = new Invoice();

  $invoice->amount = 2266;
  $invoice->user()->associate($user);
  $invoice->save();
});
