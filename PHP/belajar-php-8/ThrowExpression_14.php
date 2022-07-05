<?php
function sayHello(?string $name)
{
  if ($name ==  null) {
    throw new Exception("Tidak Boleh null");
  }

  echo "Hello $name" . PHP_EOL;
}


function sayHelloExpression(?string $name)
{
  $result = $name != null ? "Hello  $name" : throw new Exception("Tidak Boleh Null");
  echo $result . PHP_EOL;
}

sayHelloExpression("Insanie");
