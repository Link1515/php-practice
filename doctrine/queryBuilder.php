<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\App;

$conn = App::getDbConn();

$builder = $conn->createQueryBuilder();

$invoices = $builder
  ->select('id', 'amount')
  ->from('invoices')
  ->where('amount > ?')
  ->setParameter(0, 30)
  // ->getSQL();
  ->fetchAllAssociative();

var_dump($invoices);
