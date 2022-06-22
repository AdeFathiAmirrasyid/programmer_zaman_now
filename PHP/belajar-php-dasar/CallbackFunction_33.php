<?php
function sayHello(string $name, callable $filter)
{
  $finalName = call_user_func($filter, $name);
  echo "Hallo $finalName" . PHP_EOL;
}

sayHello("Insani", "strtoupper");
sayHello("Insani", "strtolower");
sayHello("Insani", function (string $name): string {
  return strtoupper($name);
});
sayHello("Insani", fn ($name) => strtoupper($name));
