<?php
session_start();

if ($_SESSION['login'] == true) {
  header('Location:/session/member.php');
  exit();
}


$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['username'] == 'insani' && $_POST['password'] == 'insani') {
    // Success
    $_SESSION['login'] = true;
    $_SESSION['username'] = "insani";
    header('Location: /session/member.php');
    exit();
  } else {
    // gagal
    $error = "Login Gagal";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php if ($error != "") { ?>
    <h2><?= $error; ?></h2>
  <?php } ?>
  <form action="/session/login.php" method="POST">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    </br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    </br>
    <input type="submit" value="Login">
  </form>

</body>

</html>