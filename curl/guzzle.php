<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Client;

$client = new Client([
  'base_uri' => 'https://jsonplaceholder.typicode.com/',
  'timeout' => 5,
  'verify' => false
]);

try {
  $query = ['postId' => 1];
  $response = $client->get('/comments', [
    'query' => $query
  ]);

  $body = $response->getBody();

  echo '<pre>';
  print_r($body->getContents());
  echo '</pre>';
} catch (ClientException $e) {
  http_response_code($e->getCode());
  echo json_encode(['message' => $e->getMessage()]);
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['message' => 'server error']);
}
