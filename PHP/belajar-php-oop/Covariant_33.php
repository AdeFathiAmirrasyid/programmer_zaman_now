<?php

require_once "data/Food_34.php";
require_once "data/Animal_16.php";
require_once "data/AnimalShelter_33.php";

$catShelter = new \Data\CatShelter();
$cat = $catShelter->adopt("Luna");
$cat->eat(new \Data\AnimalFood());

$dragon = new \Data\DragonShelter();
$dragon = $dragon->adopt("Dragon");
$dragon->eat(new \Data\Food());
