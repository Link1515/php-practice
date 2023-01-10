<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/bootstrap.php';

$userId = 42;

// 此處 where 方法會自動做 placeholder and bind value
// echo User::query()->where('id', $userId)->toSql();
// User::query()->where('id', $userId)->update(['is_active' => false]);

// User::query()->where('is_active', false)->get()->each(function (User $user) {
//   echo 'id: ' . $user->id . PHP_EOL;
//   echo 'email: ' . $user->email . PHP_EOL;
//   echo 'full name: ' . $user->full_name . PHP_EOL;
//   echo 'created at: ' . $user->created_at->toDateTimeString() . PHP_EOL;
//   echo "-----------------------------------------" . PHP_EOL;
// });

$invoices = Capsule::table('invoices')->where('amount', '>', 2000)->get();

print_r($invoices);
