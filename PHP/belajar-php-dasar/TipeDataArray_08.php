<?php
$values = array(10, 9, 8, 7.5, 6);
var_dump($values);


$names = ["Fathie", "Insani", "Diah"];
var_dump($names);

var_dump($names[0]);

$names[0] = "Alisia";
var_dump($names[0]);

unset($names[1]);
var_dump($names);

$names[] = "Isarie";
var_dump($names);
var_dump(count($names));

$insani = array(
  "id" => "Insanie",
  "name" => "Fathie Insanie",
  "age" => 24,
  "address" => array(
    "city" => "Tanggerang",
    "country" => "Indonesia"
  )
);

var_dump($insani);
var_dump($insani["name"]);
var_dump($insani["address"]["country"]);

$alisia = [
  "id" => "Alisia",
  "name" => "Alisia Setiani",
  "age" => 23,
  "address" =>[
    "city" => "Jakarta",
    "country" => "Indonesia"
  ]
];
var_dump($alisia);
var_dump($alisia["name"]);
