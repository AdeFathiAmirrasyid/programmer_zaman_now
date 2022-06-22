<?php
function sum(int $first, int $second): int
{
  $total = $first + $second;
  return $total;
}

$result = sum(10, 10);
echo $result;
