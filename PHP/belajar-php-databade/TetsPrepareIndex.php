<?php
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "insani";
$password = "insanie";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ? ";
echo $sql . PHP_EOL;
$statement = $connection->prepare($sql);
$statement->bindParam(1, $username);
$statement->bindParam(2, $password);
$statement->execute();


$success = false;
$find_user = null;
foreach ($statement as $row) {
  // Success
  $success = true;
  $find_user = $row["username"];
}

if ($success) {
  echo "Success login : " . $find_user . PHP_EOL;
} else {
  echo "Gagal login";
}

$connection = null;
