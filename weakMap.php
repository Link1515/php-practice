<?php

declare(strict_types=1);

class Invoice {
  public function __destruct() {
    echo 'Invoice class destructed';
  }
}

$invoice1 = new Invoice();
$map = new WeakMap();

$map[$invoice1] = ['a' => 1, 'b' => 2];

var_dump($map);
