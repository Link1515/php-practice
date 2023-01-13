<?php

declare(strict_types=1);

namespace App;

class Mailer {
  public function send($address, $content) {
    echo "email sent, content is: \n";
    echo $content;
  }
}
