<?php
$say = "Hello " . htmlspecialchars($_GET['name']);
?>
<html>

<head>
</head>

<body>
  <h1><?= $say; ?></h1>
</body>

</html>