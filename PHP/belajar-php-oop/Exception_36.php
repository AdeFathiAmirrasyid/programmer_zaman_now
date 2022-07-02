<?php
require_once "exception/ValidationException_36.php";
require_once "data/LoginRequest_36.php";
require_once "helper/Validation_36.php";


$loginRequest = new LoginRequest();
$loginRequest->username = "   ";
$loginRequest->password = "";



try {
  validateLoginRequest($loginRequest);
  echo "VALID" . PHP_EOL;
} catch (ValidationException | Exception $exception) {
  echo "Error : {$exception->getMessage()}" . PHP_EOL;

  var_dump($exception->getTrace());
  echo $exception->getTraceAsString() . PHP_EOL;
} finally {
  echo "ERROR ATAU ENGGAK, AKAN DIEKSEKUSI" . PHP_EOL;
}
