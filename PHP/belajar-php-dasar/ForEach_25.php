<?php
$names = ["Diah", "Fathie", "Insanie"];
for ($i = 0; $i < count($names); $i++) {
  echo "Data ke $i = $names[$i]" . PHP_EOL;
}

foreach ($names as $name) {
  echo "Data $name" . PHP_EOL;
}

$person = [
  "first_name" => "Diah",
  "middle_name" => "Fathie",
  "last_name" => "Insanie",
];

foreach ($person as $key => $value) {
  echo "$key : $value" . PHP_EOL;
}
