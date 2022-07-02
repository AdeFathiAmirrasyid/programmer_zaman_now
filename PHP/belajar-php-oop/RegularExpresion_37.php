<?php
$matches = [];
$result = (bool)preg_match_all("/natalia|fathie|isare/i", "Diah Fathie Insanie", $matches);

var_dump($result);
var_dump($matches);

$result = preg_replace("/anjing|bangsat/i", "****", "dasar lu anjing dan bangsat!");
var_dump($result);

$result = preg_split("/[\s,-,_]/", "Fathie_Insanie Alisia,Natalia,isare-intan");
var_dump($result);
