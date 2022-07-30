<?php

namespace Mvc\BelajarPhpMvc\Service;

use Mvc\BelajarPhpMvc\Config\Database;
use Mvc\BelajarPhpMvc\Domain\User;
use Mvc\BelajarPhpMvc\Exception\ValidationException;
use Mvc\BelajarPhpMvc\Model\UserLoginRequest;
use Mvc\BelajarPhpMvc\Model\UserPasswordUpdateRequest;
use Mvc\BelajarPhpMvc\Model\UserProfileUpdateRequest;
use Mvc\BelajarPhpMvc\Model\UserRegisterRequest;
use Mvc\BelajarPhpMvc\Repository\SessionRepository;
use Mvc\BelajarPhpMvc\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
  private UserService $userService;
  private UserRepository $userRepository;
  private SessionRepository $sessionRepository;

  protected function setUp(): void
  {
    $connection = Database::getConnection();
    $this->userRepository = new UserRepository($connection);
    $this->userService = new UserService($this->userRepository);
    $this->sessionRepository = new SessionRepository($connection);

    $this->sessionRepository->deleteAll();
    $this->userRepository->deleteAll();
  }

  public function testRegisterSuccess()
  {
    $request = new UserRegisterRequest();
    $request->id = "insanie";
    $request->name = "Fathie_Insanie";
    $request->password = "rahasia";

    $response = $this->userService->register($request);

    self::assertEquals($request->id, $response->user->id);
    self::assertEquals($request->name, $response->user->name);
    self::assertNotEquals($request->password, $response->user->password);

    self::assertTrue(password_verify($request->password, $response->user->password));
  }

  public function testRegisterFailed()
  {
    $this->expectException(ValidationException::class);
    $request = new UserRegisterRequest();
    $request->id = "";
    $request->name = "";
    $request->password = "";

    $this->userService->register($request);
  }
  public function testRegisterDuplicate()
  {
    $user = new User();
    $user->id = "insanie";
    $user->name = "Fathie_Insanie";
    $user->password = "rahasia";

    $this->userRepository->save($user);

    $this->expectException(ValidationException::class);

    $request = new UserRegisterRequest();
    $request->id = "insanie";
    $request->name = "Fathie_Insanie";
    $request->password = "rahasia";

    $this->userService->register($request);
  }

  public function testLoginNotFound()
  {
    $this->expectException(ValidationException::class);
    $request = new UserLoginRequest();
    $request->id = "insanie";
    $request->password = "insanie";

    $this->userService->login($request);
  }

  public function testLoginWrongPassword()
  {
    $user = new User();
    $user->id = "insanie";
    $user->name = "Fathie_Insanie";
    $user->password = password_hash("insani", PASSWORD_BCRYPT);

    $this->expectException(ValidationException::class);
    $request = new UserLoginRequest();
    $request->id = "insanie";
    $request->password = "insanie";

    $this->userService->login($request);
  }

  public function testLoginSuccess()
  {
    $user = new User();
    $user->id = "insanie";
    $user->name = "Fathie_Insanie";
    $user->password = password_hash("insanie", PASSWORD_BCRYPT);

    $this->expectException(ValidationException::class);
    $request = new UserLoginRequest();
    $request->id = "insanie";
    $request->password = "insanie";

    $response = $this->userService->login($request);

    self::assertEquals($request->id, $response->user->id);
    self::assertTrue(password_verify($request->password, $response->user->password));
  }

  public function testUpdateSuccess()
  {
    $user = new User();
    $user->id = "insani";
    $user->name = "insani";
    $user->password = password_hash("insanie", PASSWORD_BCRYPT);
    $this->userRepository->save($user);

    $request = new UserProfileUpdateRequest();
    $request->id = 'insani';
    $request->name = 'Alisia';

    $this->userService->updateProfile($request);
    $result = $this->userRepository->findById($user->id);
    self::assertEquals($request->name, $result->name);
  }

  public function testUpdateValidationError()
  {

    $this->expectException(ValidationException::class);
    $request = new UserProfileUpdateRequest();
    $request->id = '';
    $request->name = '';
    $this->userService->updateProfile($request);
  }

  public function testUpdateNotFound()
  {
    $this->expectException(ValidationException::class);
    $request = new UserProfileUpdateRequest();
    $request->id = 'insani';
    $request->name = 'Alisia';

    $this->userService->updateProfile($request);
  }

  public function testUpdatePasswordSuccess()
  {
    $user = new User();
    $user->id = "insani";
    $user->name = "insani";
    $user->password = password_hash("insanie", PASSWORD_BCRYPT);
    $this->userRepository->save($user);

    $request = new UserPasswordUpdateRequest();
    $request->id = 'insani';
    $request->oldPassword = 'insanie';
    $request->newPassword = 'new';

    $this->userService->updatePassword($request);
    $result = $this->userRepository->findById($user->id);
    self::assertTrue(password_verify($request->newPassword, $result->password));
  }

  public function testUpdatePasswordValidationError()
  {
    $this->expectException(ValidationException::class);
    $request = new UserPasswordUpdateRequest();
    $request->id = 'insani';
    $request->oldPassword = '';
    $request->newPassword = '';
    $this->userService->updatePassword($request);
  }

  public function testUpdatePasswordWrongOld()
  {
    $this->expectException(ValidationException::class);
    $user = new User();
    $user->id = "insani";
    $user->name = "insani";
    $user->password = password_hash("insanie", PASSWORD_BCRYPT);
    $this->userRepository->save($user);

    $request = new UserPasswordUpdateRequest();
    $request->id = 'insani';
    $request->oldPassword = 'cobalah';
    $request->newPassword = 'new';

    $this->userService->updatePassword($request);
  }
  public function testUpdatePasswordNotFound()
  {
    $this->expectException(ValidationException::class);

    $request = new UserPasswordUpdateRequest();
    $request->id = 'insani';
    $request->oldPassword = 'insani';
    $request->newPassword = 'new';

    $this->userService->updatePassword($request);
  }
}
