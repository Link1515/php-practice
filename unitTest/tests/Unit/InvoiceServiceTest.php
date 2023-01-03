<?php

declare(strict_types=1);

namespace Tests\Unit;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Services\InvoicesService;
use App\Services\EmailService;
use App\Services\PaymentGatewayService;
use App\Services\SalesTaxService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase {
  /** @test */
  public function it_process_invoice(): void {
    $salseTaxServiceMock = $this->createMock(SalesTaxService::class);
    $gatewayServiceMock = $this->createMock(PaymentGatewayService::class);
    $emailServiceMock = $this->createMock(EmailService::class);

    $gatewayServiceMock->method('charge')->willReturn(true);

    $invoiceService = new InvoicesService(
      $salseTaxServiceMock,
      $gatewayServiceMock,
      $emailServiceMock
    );

    $customer = ['name' => 'Link'];
    $amount = 150;

    $result = $invoiceService->process($customer, $amount);

    $this->assertTrue($result);
  }

  /** @test */
  public function it_sends_receipt_email_when_invoice_is_processed(): void {
    $salseTaxServiceMock = $this->createMock(SalesTaxService::class);
    $gatewayServiceMock = $this->createMock(PaymentGatewayService::class);
    $emailServiceMock = $this->createMock(EmailService::class);

    $gatewayServiceMock->method('charge')->willReturn(true);
    $emailServiceMock
      ->expects($this->once())
      ->method('send')
      ->with(['name' => 'Link'], 'receipt');

    $invoiceService = new InvoicesService(
      $salseTaxServiceMock,
      $gatewayServiceMock,
      $emailServiceMock
    );

    $customer = ['name' => 'Link'];
    $amount = 150;

    $result = $invoiceService->process($customer, $amount);

    $this->assertTrue($result);
  }
}
