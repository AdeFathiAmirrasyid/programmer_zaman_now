<?php

use Helper\MathHelper;

require_once "helper/MathHelper_23.php";

$mathHelper = new MathHelper();
echo MathHelper::$name . PHP_EOL;
MathHelper::$name = "Fathie Insanie";
echo MathHelper::$name . PHP_EOL;

$result = MathHelper::sum(10, 10, 10, 10, 10);
echo "Result : $result" . PHP_EOL;
