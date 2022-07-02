<?php
require_once "data/SayGoodBye_19.php";

use Data\Traits\{Person, SayHello, SayGoodBye};


$person = new Person();
$person->goodBye("Insani");
$person->hello("fathie");


$person->name = "Insanie";
// var_dump($person);


$person->run();