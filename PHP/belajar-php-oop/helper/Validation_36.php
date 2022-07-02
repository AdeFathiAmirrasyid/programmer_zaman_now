<?php
function validateLoginRequest(LoginRequest $request)
{
  if (!isset($request->username)) {
    throw new ValidationException("Username is NULL");
  } else if (!isset($request->password)) {
    throw new ValidationException("Password is NULL");
  } else if (trim($request->username) == "") {
    throw new Exception("UserName is EMPTY");
  } else if (trim($request->password) == "") {
    throw new Exception("Password is EMPTY");
  }
}
