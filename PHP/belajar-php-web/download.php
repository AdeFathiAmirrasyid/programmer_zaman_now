<?php
if (isset($_GET['key']) && $_GET['key'] == 'rahasia') {
  header('Content-Disposition: attachment; filename="lexus.jpg"');
  header('Content-Type: image/jpg');
  readfile(__DIR__ . '/file/lexus.jpg');
  exit();
} else {
  echo "Invalid Key";
}
