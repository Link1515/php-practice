<?php

declare(strict_types=1);

use App\UserManager;

require_once __DIR__ . '/vendor/autoload.php';

$container = new DI\Container();

$userManager = $container->get(UserManager::class);

$userManager->register('fdfjal@fdsf.com');
