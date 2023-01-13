<?php

declare(strict_types=1);

interface MailerInterface {
  public function send($msg);
}

class MailerA implements MailerInterface {
  public function send($msg) {
    echo "mail send by mailer A\n";
    echo "with message: {$msg}\n";
  }
}

class MailerB implements MailerInterface {
  public function send($msg) {
    echo "mail send by mailer B\n";
    echo "with message: {$msg}\n";
  }
}

class UserManager {
  private $mailer;

  public function __construct(MailerInterface $mailer) {
    $this->mailer = $mailer;
  }

  public function register() {
    $this->mailer->send('register success!');
  }
}

$userManagerUseMailerA = new UserManager(new MailerA);
$userManagerUseMailerA->register();

$userManagerUseMailerB = new UserManager(new MailerB);
$userManagerUseMailerB->register();
