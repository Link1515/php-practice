<?php

declare(strict_types=1);

namespace App;

/**
 * @property-read ?array $db
 */
class Config {
  protected array $config = [];
  public function __construct(array $env) {
    $this->config = [
      'db' => [
        'driver' => $env['DB_DRIVER'] ?? 'mysql',
        'host' => $env['DB_HOST'],
        'database' => $env['DB_DATABSE'],
        'user' => $env['DB_USER'],
        'password' => $env['DB_PASSWORD'],
      ]
    ];
  }

  public function __get(string $name)
  {
    return $this->config[$name] ?? null;
  }
}
