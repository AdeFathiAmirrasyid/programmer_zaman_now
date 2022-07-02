<?php

namespace Data;

require_once "Animal_16.php";

use Animal;
use Cat;
use Dragon;

interface AnimalShelter
{
  function adopt(string $name): Animal;
}

class CatShelter implements AnimalShelter
{
  public function adopt(string $name): Cat
  {
    $cat = new Cat();
    $cat->name = $name;
    return  $cat;
  }
}

class DragonShelter implements AnimalShelter
{
  public function adopt(string $name): Dragon
  {
    $dragon = new Dragon();
    $dragon->name = $name;
    return $dragon;
  }
}
