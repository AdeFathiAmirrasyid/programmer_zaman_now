<?php
require_once "data/Programmer_14.php";

$company = new Company();
$company->programmer = new Programmer("insanie");
var_dump($company);

$company->programmer = new BackendProgrammer("insanie");
var_dump($company);

$company->programmer = new FrontendProgrammer("insanie");
var_dump($company);

sayHelloProgrammer(new Programmer("Insanie"));
sayHelloProgrammer(new BackendProgrammer("Insanie"));
sayHelloProgrammer(new FrontendProgrammer("Insanie"));
