<?php
require_once "data/Student_27.php";

$student1 = new Student();
$student1->id = "1";
$student1->name = "Fathie_Insanie";
$student1->value = 100;


$string = (string) $student1;
echo $string . PHP_EOL;

// Bisa Seperti ini
echo $student1 . PHP_EOL;
