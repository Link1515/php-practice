<?php

declare(strict_types=1);

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once __DIR__ . '/vendor/autoload.php';

const VIEW_PATH = __DIR__ . '/views';
const STORAGE_PATH = __DIR__ . '/storage';

$loader = new FilesystemLoader(VIEW_PATH);
$twig = new Environment($loader, [
  'cache' => STORAGE_PATH . '/cache',
  'auto_reload' => true
]);

$data = [
  'item1' => 'apple',
  'item2' => 'banana',
  'item3' => 'cat',
  'item4' => 'dog',
];

echo $twig->render('index.twig', ['name' => 'Link', 'data' => $data]);
