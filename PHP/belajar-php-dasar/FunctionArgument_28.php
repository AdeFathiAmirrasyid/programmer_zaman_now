<?php
function sayHello($firstName, $lastName = "")
{
  echo "Hello $firstName $lastName" . PHP_EOL;
}

sayHello("Fathie");
sayHello("Insanie");
sayHello("Fathie Insanie");

function sum(int $first, int $last)
{
  $total = $first + $last;
  echo "Total $first + $last = $total" . PHP_EOL;
}

sum(100, 100);
sum("100", "100");
sum(true, false);


function sumAll(array $values)
{
  $total = 0;
  foreach ($values as $value) {
    $total += $value;
  }

  echo "Total  " . implode(",", $values) . " = $total" . PHP_EOL;
}

sumAll([1, 2, 3, 4, 5]);


echo "==== Variable Argument List ====" . PHP_EOL;
function sumAllList(...$values)
{
  $total = 0;
  foreach ($values as $value) {
    $total += $value;
  }

  echo "Total  " . implode(",", $values) . " = $total" . PHP_EOL;
}


$values = [1, 2, 3, 4, 5];
sumAllList(...$values);
