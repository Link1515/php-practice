<?php

declare(strict_types=1);

namespace App\Exceptions\Container;

use Psr\Container\ContainerExceptionInterface;

class ContainerException extends \Exception implements ContainerExceptionInterface {
  protected $message = '404 Not Found';
}
