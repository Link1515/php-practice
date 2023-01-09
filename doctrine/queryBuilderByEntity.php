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

$queryBuilder = $entityManager->createQueryBuilder();

$query = $queryBuilder
  // column name is from entity class property not from mysql
  ->select('u.email', 'u.fullName', 'u.createdAt', 'i.amount')
  ->from(User::class, 'u')
  ->leftJoin('u.invoices', 'i')
  ->where('u.id = :id')
  ->setParameter(':id', 11)
  ->getQuery();

echo $query->getDQL();

$user = $query->getResult();

print_r($user);
