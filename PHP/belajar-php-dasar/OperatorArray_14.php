<?php
$first = [
  "first_name" => "Fathie"
];

$last = [
  "first_name" => "Fathie",
  "last_name" => "Insanie"
];

$full = $first + $last;
var_dump($full);

$a = [
  "first_name" => "Fathie",
  "last_name" => "Insanie"
];

$b = [
  "last_name" => "Insanie",
  "first_name" => "Fathie",
];

var_dump($a == $b);
var_dump($a === $b);

