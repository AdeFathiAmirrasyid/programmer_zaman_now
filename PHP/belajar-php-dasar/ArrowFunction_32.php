<?php
$firstName = "Fathie";
$lastName = "Insanie";

$anonymousFunction = function () use ($firstName, $lastName) {
  return "Hello $firstName $lastName" . PHP_EOL;
};


$arrowFunction = fn () => "Hello $firstName $lastName" . PHP_EOL;

echo $anonymousFunction();
echo $arrowFunction();
