<?php
require_once "data/Conflict_09.php";
require_once "data/Helper_09.php";

use Data\one\{Conflict as Conflict1, Dummy, Sample};
use Data\two\Conflict as Conflict2;
use function Helper\{helpme};
use const Helper\APPLICATION as APP;

$conflict1 = new Conflict1();
$dummy = new Dummy();
$sample = new Sample();
