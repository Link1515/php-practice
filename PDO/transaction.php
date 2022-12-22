<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
  $db = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], [
    PDO::ATTR_EMULATE_PREPARES => false
  ]);
} catch (\PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$currentTime = new DateTime(timezone: new DateTimeZone('Asia/Taipei'));


$email = '789789@sffafds.com';
$name = '123777';
$isActive = 1;
$createdAt = $currentTime->format('Y-m-d H:i:s');

echo $createdAt;

try {
  $db->beginTransaction();

  $newUserStmt = $db->prepare('INSERT INTO users (email, full_name, is_active, created_at)
    VALUES (:email, :name, :isActive, :createdAt)
  ');

  $newInvoicesStmt = $db->prepare('INSERT INTO invoices (amount, user_id)
    VALUES (:amount, :user_id)
  ');

  $newUserStmt->execute([
    'email' => $email,
    'name' => $name,
    'isActive' => $isActive,
    'createdAt' => $createdAt
  ]);

  $userId = (int) $db->lastInsertId();
  $amount = 25;

  $newInvoicesStmt->execute([
    'user_id' => $userId,
    'amount' => $amount
  ]);

  $db->commit();
} catch (\Throwable $th) {
  if ($db->inTransaction()) {
    $db->rollBack();
  }
}
