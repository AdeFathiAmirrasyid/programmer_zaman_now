<?php

namespace Mvc\BelajarPhpMvc\Service;

use Exception;
use Mvc\BelajarPhpMvc\Config\Database;
use Mvc\BelajarPhpMvc\Domain\User;
use Mvc\BelajarPhpMvc\Exception\ValidationException;
use Mvc\BelajarPhpMvc\Model\UserLoginRequest;
use Mvc\BelajarPhpMvc\Model\UserLoginResponse;
use Mvc\BelajarPhpMvc\Model\UserPasswordUpdateRequest;
use Mvc\BelajarPhpMvc\Model\UserPasswordUpdateResponse;
use Mvc\BelajarPhpMvc\Model\UserProfileUpdateRequest;
use Mvc\BelajarPhpMvc\Model\UserProfileUpdateResponse;
use Mvc\BelajarPhpMvc\Model\UserRegisterRequest;
use Mvc\BelajarPhpMvc\Model\UserRegisterRespone;
use Mvc\BelajarPhpMvc\Repository\UserRepository;

class UserService
{
  private UserRepository $userRepository;
  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function register(UserRegisterRequest $request): UserRegisterRespone
  {
    $this->validateUserRegistrationRequest($request);
    try {
      Database::beginTransaction();
      $user = $this->userRepository->findById($request->id);
      if ($user != null) {
        throw new ValidationException("User already exists");
      }

      $user = new User();
      $user->id = $request->id;
      $user->name = $request->name;
      $user->password = password_hash($request->password, PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $response = new UserRegisterRespone();
      $response->user = $user;
      Database::commitTransaction();
      return $response;
    } catch (Exception $exception) {
      Database::rollbackTransaction();
      throw $exception;
    }
  }

  private function validateUserRegistrationRequest(UserRegisterRequest $request)
  {
    if (
      $request->id == null || $request->name == null || $request->password == null ||
      trim($request->id) == "" || trim($request->name) == "" || trim($request->password) == ""
    ) {
      throw new ValidationException("Id, Name, Password can not blank");
    }
  }

  public function login(UserLoginRequest $request): UserLoginResponse
  {
    $this->validateUserLoginRequest($request);
    $user = $this->userRepository->findById($request->id);
    if ($user == null) {
      throw new ValidationException("Id or Password is wrong");
    }

    if (password_verify($request->password, $user->password)) {
      $response = new UserLoginResponse();
      $response->user = $user;
      return $response;
    } else {
      throw new ValidationException("Id or Password is wrong");
    }
  }
  private function validateUserLoginRequest(UserLoginRequest $request)
  {
    if (
      $request->id == null || $request->password == null ||
      trim($request->id) == "" || trim($request->password) == ""
    ) {
      throw new ValidationException("Id, Password can not blank");
    }
  }

  public function updateProfile(UserProfileUpdateRequest $request): UserProfileUpdateResponse
  {
    $this->validateUserprofileUpdateRequest($request);
    try {
      Database::beginTransaction();

      $user = $this->userRepository->findById($request->id);
      if ($user == null) {
        throw new ValidationException("User is not found");
      }

      $user->name = $request->name;
      $this->userRepository->update($user);

      Database::commitTransaction();

      $response = new UserProfileUpdateResponse();
      $response->user = $user;
      return $response;
    } catch (Exception $exception) {
      Database::rollbackTransaction();
      throw $exception;
    }
  }

  private function validateUserprofileUpdateRequest(UserProfileUpdateRequest $request)
  {
    if (
      $request->id == null || $request->name == null ||
      trim($request->id) == "" || trim($request->name) == ""
    ) {
      throw new ValidationException("Id, Name can not blank");
    }
  }

  public function updatePassword(UserPasswordUpdateRequest $request)
  {
    $this->validateUserPasswordUpdateRequest($request);
    try {
      Database::beginTransaction();
      $user = $this->userRepository->findById($request->id);
      if ($user == null) {
        throw new ValidationException("User is not found");
      }
      if (!password_verify($request->oldPassword, $user->password)) {
        throw new ValidationException("Old password is wrong");
      }

      $user->password  = password_hash($request->newPassword, PASSWORD_BCRYPT);
      $this->userRepository->update($user);

      Database::commitTransaction();


      $response = new UserPasswordUpdateResponse();
      $response->user = $user;
      return $response;
    } catch (Exception $exception) {
      Database::rollbackTransaction();
      throw $exception;
    }
  }

  private function validateUserPasswordUpdateRequest(UserPasswordUpdateRequest $request)
  {
    if (
      $request->id == null || $request->oldPassword == null || $request->newPassword == null ||
      trim($request->id) == "" || trim($request->oldPassword) == "" || trim($request->newPassword) == ""
    ) {
      throw new ValidationException("Id, Old Password, New Password can not blank");
    }
  }
}
