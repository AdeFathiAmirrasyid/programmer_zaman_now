<?php
$sayHello = function (string $name) {
  echo "Hello $name" . PHP_EOL;
};

$sayHello("Fathie");
$sayHello("Insanie");

function sayGoodBye(string $name, $filter)
{
  $finalName = $filter($name);
  echo "Good bye $finalName" . PHP_EOL;
}

sayGoodBye("Insanie", function (string $name): string {
  return strtoupper($name);
});

$filterFunction = function (string $name): string {
  return strtoupper($name);
};
sayGoodBye("Insanie", $filterFunction);



$firstName = "Fathie";
$lastName = "Insanie";

$sayHelloInsanie = function () use ($firstName, $lastName) {
  echo "Hello $firstName $lastName" . PHP_EOL;
};

$sayHelloInsanie();
