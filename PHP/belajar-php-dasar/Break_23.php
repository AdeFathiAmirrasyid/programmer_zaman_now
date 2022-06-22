<?php

$counter = 1;
while (true) {
  echo "Ini adalah while loop ke-$counter" . PHP_EOL;
  $counter++;

  if($counter > 10){
    break;
  }
}