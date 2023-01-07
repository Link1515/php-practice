<?php

declare(strict_types=1);

namespace App;

class App {
  public function __construct(protected Router $router, protected array $request) {
  }

  public function run() {
    try {
      echo $this->router->resolve(
        $this->request['uri'],
        $this->request['method']
      );
    } catch (RouteNotFoundException) {
      http_response_code(404);
    }
  }
}
