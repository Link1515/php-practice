<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\App;

$conn = App::getDbConn();

$schema = $conn->createSchemaManager();

print_r($schema->listTableNames());
print_r(array_keys($schema->listTableColumns('users')));
