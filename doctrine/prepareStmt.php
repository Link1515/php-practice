<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\App;

$conn = App::getDbConn();

$stmt = $conn->prepare('SELECT * FROM users WHERE created_at BETWEEN :from AND :to');

$from = new DateTime('12/21/2022 05:00:00');
$to = new DateTime('12/24/2022 00:00:00');

$stmt->bindValue(':from', $from, 'datetime');
$stmt->bindValue(':to', $to, 'datetime');

$result = $stmt->executeQuery();

print_r($result->fetchAllAssociative());
