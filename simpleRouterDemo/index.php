<?php

use App\Exceptions\RouteNotFoundException;
use App\View;

require __DIR__ . '/vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/storage');
define('VIEW_PATH', __DIR__ . '/app/views');

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

try {
  $router = new App\Router();

  $router
    ->get('/', [App\Controllers\HomeController::class, 'index'])
    ->post('/upload', [App\Controllers\HomeController::class, 'upload'])
    ->get('/download', [App\Controllers\HomeController::class, 'download'])
    ->get('/invoices', [App\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [App\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [App\Controllers\InvoiceController::class, 'store']);

  echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
} catch (RouteNotFoundException $e) {
  // header('HTTP/1.1 404 Not Found');
  http_response_code(404);

  echo View::make('error/404');
}
