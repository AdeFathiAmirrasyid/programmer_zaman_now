<?php
require_once "data/Manager_08.php";

$manager = new Manager();
$manager->name = "Insani";
$manager->sayHello("Alisia");

$vp = new VicePresident();
$vp->name = "Fathie";
$vp->sayHello("Alisia");
