<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule = new Capsule;

$capsule->addConnection([
  'driver' => 'mysql',
  'host' => '127.0.0.1',
  'database' => 'practice_db',
  'username' => 'root',
  'password' => '1234',
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix' => ''
]);

$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();

date_default_timezone_set('Asia/Taipei');
