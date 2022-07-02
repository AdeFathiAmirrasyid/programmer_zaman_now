<?php
require_once "exception/ValidationException_36.php";
require_once "data/LoginRequest_36.php";
require_once "helper/ValidationUtil_38.php";

$request = new LoginRequest();
$request->username = "insani";
$request->password = "alisia";
// ValidationUtil::validate($request);
ValidationUtil::validateReflection($request);


class RegisterUserRequest
{
  public ?string $name;
  public ?string $address;
  public ?string $email;
}

$register = new RegisterUserRequest();
$register->name = "Insanie";
$register->address = "Cirebon";
$register->email = "insanie@gmail.com";

ValidationUtil::validateReflection($register);

ValidationUtil::validate($register);
