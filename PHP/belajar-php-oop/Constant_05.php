<?php
require_once "data/Person_01.php";

// php version old
// difine("APPLICATION" . "Belajar PHP OOP");


// php version new
const APP_VERSION = "1.0.0";
// echo APPLICATION . PHP_EOL;
echo APP_VERSION . PHP_EOL;

echo Person::AUTHOR . PHP_EOL;
