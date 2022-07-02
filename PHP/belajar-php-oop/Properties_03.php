<?php
require_once "data/Person_01.php";

$person = new Person("Fathie", "Cirebon");

$person->name = "Fathie_Insanie";
$person->address = "Cirebon";

var_dump($person);

echo "Name : $person->name" . PHP_EOL;
echo "Address : $person->address" . PHP_EOL;
echo "Country : $person->country" . PHP_EOL;

$person2 = new Person("Insanie", null);
$person2->name = "Diah Insanie";
$person2->address = null;

var_dump($person2);

// ERROR
// $person2->name = [];