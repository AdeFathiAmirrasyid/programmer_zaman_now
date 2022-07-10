<?php
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();
$connection->beginTransaction();


$connection->exec("insert into comments(email,comment)values('diahinsani@gmail.com','hi')");
$connection->exec("insert into comments(email,comment)values('diahinsani@gmail.com','hi')");
$connection->exec("insert into comments(email,comment)values('diahinsani@gmail.com','hi')");
$connection->exec("insert into comments(email,comment)values('diahinsani@gmail.com','hi')");
$connection->exec("insert into comments(email,comment)values('diahinsani@gmail.com','hi')");

$connection->rollBack();
$connection = null;
