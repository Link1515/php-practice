<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\App;
use App\Models\User;
use App\Models\Invoice;
use App\Models\SignUp;

class InvoiceController {
  public function index(): View {
    $email = 'fdfefe@fdka.com';
    $name = 'erooo';
    $amount = 77;

    $userModel = new User();
    $invoiceModel = new Invoice();

    $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
      [
        'email' => $email,
        'name' => $name
      ],
      [
        'amount' => $amount
      ]
    );

    return View::make('invoices/index', ['invoice' => $invoiceModel->find($invoiceId)]);
  }

  public function create(): View {
    return View::make('invoices/create');
  }

  public function store() {
    $amount = $_POST['amount'];

    var_dump($amount);
  }
}
