<?php
require_once "data/Person_01.php";

$insanie = new Person("Insanie", "Tanggerang");
$insanie->name = "Insanie";
$insanie->sayHello("Fathie");


$diah = new Person("Diah", "Cirebon");
$diah->name = "Diah";
$diah->sayHello(null);


$insanie->info();
$diah->info();
