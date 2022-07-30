<?php

namespace Mvc\BelajarPhpMvc\Controller {

  require_once __DIR__ . '/../Helper/helper.php';

  use Mvc\BelajarPhpMvc\Config\Database;
  use Mvc\BelajarPhpMvc\Domain\Session;
  use Mvc\BelajarPhpMvc\Domain\User;
  use Mvc\BelajarPhpMvc\Repository\SessionRepository;
  use Mvc\BelajarPhpMvc\Repository\UserRepository;
  use Mvc\BelajarPhpMvc\Service\SessionService;
  use PHPUnit\Framework\TestCase;

  class UserControllerTest extends TestCase
  {
    private UserController $userController;
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;


    protected function setUp(): void
    {
      $this->userController =  new UserController();

      $this->sessionRepository = new SessionRepository(Database::getConnection());
      $this->sessionRepository->deleteAll();

      $this->userRepository = new UserRepository(Database::getConnection());
      $this->userRepository->deleteAll();

      putenv('mode=test');
    }
    public function testRegister()
    {
      $this->userController->register();
      $this->expectOutputRegex("[Register]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Name]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Register new User]");
    }
    public function testPostRegisterSuccess()
    {
      $_POST['id'] = 'insani';
      $_POST['name'] = 'insani';
      $_POST['password'] = 'insani';

      $this->userController->postRegister();
      $this->expectOutputRegex("[Location: /users/login]");
    }

    public function testPostRegisterValidationError()
    {
      $_POST['id'] = '';
      $_POST['name'] = 'insani';
      $_POST['password'] = 'insani';

      $this->userController->postRegister();

      $this->expectOutputRegex("[Register]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Name]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Register new User]");
      $this->expectOutputRegex("[Id, Name, Password can not blank]");
    }
    public function testPostRegisterDuplicate()
    {

      $user = new User();
      $user->id = 'insani';
      $user->name = 'insani';
      $user->password = 'insani';

      $this->userRepository->save($user);

      $_POST['id'] = 'insani';
      $_POST['name'] = 'insani';
      $_POST['password'] = 'insani';

      $this->userController->postRegister();

      $this->expectOutputRegex("[Register]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Name]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Register new User]");
      $this->expectOutputRegex("[User already exists]");
    }
    public function testLogin()
    {
      $this->userController->login();

      $this->expectOutputRegex("[Login user]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Password]");
    }
    public function testLoginSuccess()
    {
      $user = new User();
      $user->id = 'insani';
      $user->name = 'insani';
      $user->password = password_hash('insani', PASSWORD_BCRYPT);

      $this->userRepository->save($user);


      $_POST['id'] = 'insani';
      $_POST['password'] = 'insani';

      $this->userController->postLogin();

      $this->expectOutputRegex("[Location: /]");
      $this->expectOutputRegex("[X-PZN-SESSION: ]");
    }
    public function testLoginValidationError()
    {
      $_POST['id'] = '';
      $_POST['password'] = '';

      $this->userController->postLogin();
      $this->expectOutputRegex("[Login user]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id, Password can not blank]");
    }

    public function testLoginUserNotFound()
    {
      $_POST['id'] = 'notfound';
      $_POST['password'] = 'notfound';

      $this->userController->postLogin();

      $this->expectOutputRegex("[Login user]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id or Password is wrong]");
    }

    public function testLoginWrongPassword()
    {
      $user = new User();
      $user->id = 'insani';
      $user->name = 'insani';
      $user->password = password_hash('insani', PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $_POST['id'] = 'insani';
      $_POST['password'] = 'salah';

      $this->userController->postLogin();

      $this->expectOutputRegex("[Login user]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id or Password is wrong]");
    }

    public function testLogout()
    {
      $user = new User();
      $user->id = 'insani';
      $user->name = 'Fathie_Insanie';
      $user->password = password_hash('insani', PASSWORD_BCRYPT);
      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->userController->logout();
      $this->expectOutputRegex("[Location: /]");
      $this->expectOutputRegex("[X-PZN-SESSION: ]");
    }

    public function testUpdateProfile()
    {
      $user = new User();
      $user->id = 'insani';
      $user->name = 'Fathie_Insanie';
      $user->password = password_hash('insani', PASSWORD_BCRYPT);
      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->userController->updateProfile();
      $this->expectOutputRegex("[Profile]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[insani]");
      $this->expectOutputRegex("[Name]");
      $this->expectOutputRegex("[Fathie_Insanie]");
    }

    public function testPostUpdateProfileSuccess()
    {
      $user = new User();
      $user->id = 'insani';
      $user->name = 'insani';
      $user->password = password_hash('insani', PASSWORD_BCRYPT);
      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST['name'] = 'Alisia';
      $this->userController->postUpdateProfile();

      $this->expectOutputRegex("[Location: /]");
      $result = $this->userRepository->findById('insani');
      self::assertEquals("Alisia", $result->name);
    }

    public function testPostUpdateProfileValidationError()
    {
      $user = new User();
      $user->id = 'insani';
      $user->name = 'insani';
      $user->password = password_hash('insani', PASSWORD_BCRYPT);
      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST['name'] = '';
      $this->userController->postUpdateProfile();

      $this->expectOutputRegex("[Profile]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[insani]");
      $this->expectOutputRegex("[Name]");
      $this->expectOutputRegex("[Id, Name can not blank]");
    }

    public function testUpdatePassword()
    {

      $user = new User();
      $user->id = 'insani';
      $user->name = 'insani';
      $user->password = password_hash('insani', PASSWORD_BCRYPT);
      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->userController->updatePassword();

      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[insani]");
    }

    public function testPostUpdatePasswordSuccess()
    {
      $user = new User();
      $user->id = 'insani';
      $user->name = 'insani';
      $user->password = password_hash('insani', PASSWORD_BCRYPT);
      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST['oldPassword'] = 'insani';
      $_POST['newPassword'] = 'alisia';
      $this->userController->postUpdatePassword();

      $this->expectOutputRegex("[Location: /]");
      $result = $this->userRepository->findById($user->id);
      self::assertTrue(password_verify('alisia', $result->password));
    }

    public function testPostUpdatePasswordValidationError()
    {
      $user = new User();
      $user->id = 'insani';
      $user->name = 'insani';
      $user->password = password_hash('insani', PASSWORD_BCRYPT);
      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST['oldPassword'] = '';
      $_POST['newPassword'] = '';
      $this->userController->postUpdatePassword();

      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[insani]");
      $this->expectOutputRegex("[Id, Old Password, New Password can not blank]");
    }

    public function testPostUpdatePasswordWrongPassword()
    {
      $user = new User();
      $user->id = 'insani';
      $user->name = 'insani';
      $user->password = password_hash('insani', PASSWORD_BCRYPT);
      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST['oldPassword'] = 'alisia';
      $_POST['newPassword'] = 'natalia';
      $this->userController->postUpdatePassword();

      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[insani]");
      $this->expectOutputRegex("[Old password is wrong]");
    }
  }
}
