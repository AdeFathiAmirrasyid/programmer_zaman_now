<?php
function createName()
{

  global $name; // global keyword
  $name = "Insani"; // Local Scope
}

createName();
echo $name . PHP_EOL;
