<?php

use App\App;
use App\Container;
use App\Router;
use App\Controllers\HomeController;

require __DIR__ . '/vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/storage');
define('VIEW_PATH', __DIR__ . '/app/views');

$container = new Container();
$router = new Router($container);

$router
  ->get('/', [HomeController::class, 'index']);

(new App($router, [
  'uri' => $_SERVER['REQUEST_URI'],
  'method' => strtolower($_SERVER['REQUEST_METHOD'])
]))->run();
