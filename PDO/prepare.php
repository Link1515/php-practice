<?php

try {
  $db = new PDO('mysql:host=127.0.0.1;dbname=practice_db', 'root', '1234', [
    PDO::ATTR_EMULATE_PREPARES => false
  ]);
} catch (\PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$email = 'fdasf@sffafds.com';
$name = 'lkjl';
$isActive = 1;
$createdAt = date('Y-m-d H:m:i');

$query = 'INSERT INTO users (email, full_name, is_active, created_at) 
          VALUES (:email, :name, :isActive, :createdAt)';

$stmt = $db->prepare($query);

$stmt->bindValue('email', $email);
$stmt->bindValue('name', $name);
$stmt->bindValue('isActive', $isActive, PDO::PARAM_BOOL);
$stmt->bindValue('createdAt', $createdAt);

$stmt->execute();

echo '<pre>';
var_dump($db->query('SELECT * FROM users WHERE id = ' . $db->lastInsertId())->fetch());
echo '</pre>';
