<?php
function foo()
{
  echo "Foo" . PHP_EOL;
}

function bar()
{
  echo "Bar" . PHP_EOL;
}

$functionFoo =  "foo";
$functionFoo();

$functionFoo =  "bar";
$functionFoo();


function sayHello(string $name, $filter)
{
  $finalName = $filter($name);
  echo "Hello $finalName " . PHP_EOL;
}

function sampleFunction(string $name):string{
  return "Sample $name";
}

sayHello("Insanie", "sampleFunction");
sayHello("Insanie", "strtoupper");
sayHello("Insanie", "strtolower");
