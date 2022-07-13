<?php


header('Application: Belajar PHP Web');
header('Author: Fathie Insanie');

$client = $_SERVER['HTTP_CLIENT_NAME'];
echo "Hello $client";
