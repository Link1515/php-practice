<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Entity\Invoice;
use Dotenv\Dotenv;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$params = [
  'dbname' => $_ENV['DB_DATABASE'],
  'user' => $_ENV['DB_USER'],
  'password' => $_ENV['DB_PASS'],
  'host' => $_ENV['DB_HOST'],
  'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];

$entityManager = EntityManager::create($params, ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/app/Entity']));

// ***** insert *****

$user = (new User())
  ->setFullName('TestUser4455')
  ->setEmail('ew554@aaa.com')
  ->setIsActive(1);

$invoice = (new Invoice())
  ->setAmount(2022)
  ->setUser($user);

$entityManager->persist($user);
$entityManager->persist($invoice);
$entityManager->flush();

// ***** update *****
// $user = $entityManager->find(User::class, 29);

// $user->setIsActive(0);
// $user->getInvoice()->get(0)->setAmount(2023);

// $entityManager->flush();
