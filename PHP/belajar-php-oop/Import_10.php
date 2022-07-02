<?php
require_once "data/Conflict_09.php";
require_once "data/Helper_09.php";

use Data\one\Conflict;
use function Helper\helpme;
use const Helper\APPLICATION;

$conflict = new Conflict();
$conflict2 = new Data\two\Conflict();

helpme();

echo APPLICATION . PHP_EOL;
