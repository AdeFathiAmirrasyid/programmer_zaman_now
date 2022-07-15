<?php
require_once __DIR__ . '/vendor/autoload.php';

use Programmerzamannow\Data\People;


$people = new People("Insani");
echo $people->sayHello("Natalie") . PHP_EOL;
