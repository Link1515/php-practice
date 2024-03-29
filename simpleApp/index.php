<?php

require __DIR__ . '/vendor/autoload.php';

use App\App;
use App\Container;
use App\Router;
use App\Config;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('STORAGE_PATH', __DIR__ . '/storage');
define('VIEW_PATH', __DIR__ . '/app/views');

$container = new Container();
$router = new Router($container);

$router
  ->get('/', [HomeController::class, 'index'])
  ->post('/upload', [HomeController::class, 'upload'])
  ->get('/download', [HomeController::class, 'download'])
  ->get('/invoices', [InvoiceController::class, 'index'])
  ->get('/invoices/create', [InvoiceController::class, 'create'])
  ->post('/invoices/create', [InvoiceController::class, 'store'])
  ->get('/invoices/process', [InvoiceController::class, 'process']);


(new App($router, [
  'uri' => $_SERVER['REQUEST_URI'],
  'method' => strtolower($_SERVER['REQUEST_METHOD'])
], new Config($_ENV)))->run();
