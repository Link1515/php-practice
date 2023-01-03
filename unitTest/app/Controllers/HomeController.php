<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\InvoicesService;

class HomeController {
  public function __construct(private InvoicesService $invoicesService) {
  }
  public function index() {
    $this->invoicesService->process([], 25);

    echo 'hi';
  }
}
