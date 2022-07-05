<?php
function sayHello(string $first, string $middle = "", string $last): void
{
  echo "Hello $first $middle $last" . PHP_EOL;
}


// Without named argument
sayHello("Diah", "Fathie", "Insanie");
// sayHello("Diah", "Insanie"); // ERROR

//With Named Argument
sayHello(last: "Insanie", first: "Diah", middle: "Fathie");
// sayHello(last: "Insanie", first: "Diah");
