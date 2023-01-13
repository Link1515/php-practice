<?php

declare(strict_types=1);

$handle = curl_init();
$query = http_build_query([
  'postId' => 1
]);
$url = 'https://jsonplaceholder.typicode.com/comments?' . $query;

curl_setopt_array($handle, [
  CURLOPT_URL => $url,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_TIMEOUT => 5,
  CURLOPT_RETURNTRANSFER => true
]);

$content = curl_exec($handle);

if ($error = curl_error($handle)) {
}

// echo $content;
echo '<pre>';
print_r(json_decode($content, true));

// echo '<pre>';
// print_r(curl_getinfo($handle));
// echo '</pre>'
