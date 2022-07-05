<?php

$value = "E";
$result = "";

switch ($value) {
  case "A":
  case "B":
  case "C":
    $result = "Anda LULUS";
    break;
  case "D":
    $result = "Anda tidak LULUS";
    break;
  case "E":
    $result = "Mungkin Anda salah Jurusan";
    break;
  default:
    $result = "Nilai apa itu?";
}


echo $result . PHP_EOL;
$result = match ($value) {
  "A", "B", "C" => "Anda lulus",
  "D" => "Anda Tidak Lulus",
  "E" => "Mungkin Anda salah jurusan",
  default => "Nilai apa itu?"
};

echo $result . PHP_EOL;


$value = 65;
$result = match (true) {
  $value >= 80 => "A",
  $value >= 70 => "B",
  $value >= 60 => "C",
  $value >= 50 => "D",
  default => "E"
};
echo $result . PHP_EOL;


$name = "Mrs. Insani";
$result = match (true) {
  str_contains($name, "Mr.") => "Hello Sir",
  str_contains($name, "Mrs.") => "Hello Mam",
  default => "Hello"
};

echo $result . PHP_EOL;
