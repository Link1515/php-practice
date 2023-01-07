<?php

declare(strict_types=1);

namespace App;

use Dotenv\Dotenv;
use Doctrine\DBAL\DriverManager;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class App {
  private static $dbConn;

  public static function getDbConn() {
    if (!isset(self::$dbConn)) {
      $connectionParams = [
        'dbname' => $_ENV['DB_DATABASE'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],
        'host' => $_ENV['DB_HOST'],
        'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
      ];

      self::$dbConn = DriverManager::getConnection($connectionParams);
    }

    return self::$dbConn;
  }
}
