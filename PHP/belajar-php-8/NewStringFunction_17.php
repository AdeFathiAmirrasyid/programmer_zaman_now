<?php
var_dump(str_contains("Fathie Insanie", "Fathie"));
var_dump(str_contains("Fathie Insanie", "Insanie"));
var_dump(str_contains("Fathie Insanie", "Alisia"));

echo "===================" . PHP_EOL;
var_dump(str_starts_with("Fathie Insanie", "Fathie"));
var_dump(str_starts_with("Fathie Insanie", "Insanie"));
var_dump(str_starts_with("Fathie Insanie", "Alisia"));

echo "===================" . PHP_EOL;
var_dump(str_ends_with("Fathie Insanie", "Fathie"));
var_dump(str_ends_with("Fathie Insanie", "Insanie"));
var_dump(str_ends_with("Fathie Insanie", "Alisia"));
