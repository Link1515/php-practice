<?php

declare(strict_types=1);

namespace App;

class UserManager {
  private $mailer;

  public function __construct(Mailer $mailer) {
    $this->mailer = $mailer;
  }

  public function register($email) {

    echo "send to \n";
    echo "email: {$email}";

    $this->mailer->send($email, 'Hello and welcome!');
  }
}
