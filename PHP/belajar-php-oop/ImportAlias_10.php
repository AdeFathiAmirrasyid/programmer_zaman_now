<?php
require_once "data/Conflict_09.php";
require_once "data/Helper_09.php";

use Data\one\Conflict as Conflict1;
use Data\two\Conflict as Conflict2;
use function Helper\helpme as help;
use const Helper\APPLICATION as APP;

$conflict1 = new Conflict1();
$conflict2 = new Conflict2();

help();

echo APP . PHP_EOL;
