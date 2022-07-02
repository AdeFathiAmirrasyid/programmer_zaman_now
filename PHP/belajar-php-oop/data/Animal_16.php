<?php

require_once "Food_34.php";

use Data\AnimalFood;
use Data\Food;

abstract class Animal
{
  public string $name;
  abstract public function run(): void;

  abstract public function eat(AnimalFood $animalFood): void;
}

class Cat extends Animal
{
  public function run(): void
  {
    echo "Cat $this->name is running" . PHP_EOL;
  }

  public function eat(AnimalFood $animalFood): void
  {
    echo "Cat is eating" . PHP_EOL;
  }
}

class Dragon extends Animal
{
  public function run(): void
  {
    echo "Dragon $this->name is running" . PHP_EOL;
  }
  
  public function eat(Food $animalFood): void
  {
      echo "Dragon is eating" . PHP_EOL;
  }
}
