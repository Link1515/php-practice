<?php

declare(strict_types=1);

class Mailer {
  public function send($msg) {
    echo "mail is sent! \n";
    echo "with message: {$msg}";
  }
}

class UserManager {
  private $mailer;

  public function __construct(Mailer $mailer) {
    $this->mailer = $mailer;
  }

  public function register() {
    $this->mailer->send('register success!');
  }
}

$userManager = new UserManager(new Mailer);

$userManager->register();
