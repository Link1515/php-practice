<?php

try {
  $db = new PDO('mysql:host=127.0.0.1;dbname=practice_db', 'root', '1234', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
  ]);

  $query = 'SELECT * FROM users';
  $stmt = $db->query($query);

  echo '<pre>';
  print_r($stmt->fetchAll()[0]);
  echo '</pre>';
} catch (\PDOException $e) {
  throw new PDOException($e->getMessage(), $e->getCode());
}
