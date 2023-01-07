<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

$text = 
<<<TEXT
Hello world!
TEXT;

$html =
<<<HTML
<h2 style="color: blue; font-weight: 700;">Hello world!</h2>
HTML;

$email = (new Email())
  ->from('support@example.com')
  ->to('test@example.com')
  ->subject('Welcome!')
  ->text($text)
  ->html($html);

$dsn = 'smtp://mailhog:1025';

$transport = Transport::fromDsn($dsn);

$mailer = new Mailer($transport);

$mailer->send($email);
?>

<h2>email sent!</h2>