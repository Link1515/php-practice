<?php

function lazyRange(int $start, int $end): Generator {
  for ($i = $start; $i < $end; $i++) {
    yield $i => $i;
  }
}

$numbers = lazyRange(1, 100);

foreach ($numbers as $key => $value) {
  echo "{$key}: {$value} \n";
}
