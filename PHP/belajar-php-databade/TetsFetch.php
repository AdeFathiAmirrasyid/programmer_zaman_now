<?php
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "insani";
$password = "insani";

$sql = "SELECT * FROM admin WHERE username = :username AND password = :password ";
$statement = $connection->prepare($sql);
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);
$statement->execute();

if ($row = $statement->fetch()) {
  echo "Success login : " . $row["username"] . PHP_EOL;
} else {
  echo "Gagal login";
}

var_dump($statement->fetch());

$connection = null;
