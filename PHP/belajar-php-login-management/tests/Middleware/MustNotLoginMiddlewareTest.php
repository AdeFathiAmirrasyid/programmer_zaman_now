<?php

namespace Mvc\BelajarPhpMvc\Middleware {

  require_once __DIR__ . '/../Helper/helper.php';

  use Mvc\BelajarPhpMvc\Config\Database;
  use Mvc\BelajarPhpMvc\Domain\Session;
  use Mvc\BelajarPhpMvc\Domain\User;
  use Mvc\BelajarPhpMvc\Repository\SessionRepository;
  use Mvc\BelajarPhpMvc\Repository\UserRepository;
  use Mvc\BelajarPhpMvc\Service\SessionService;
  use PHPUnit\Framework\TestCase;

  class MustNotLoginMiddlewareTest extends TestCase
  {
    private MustNotLoginMiddleware $middleware;
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;

    protected function setUp(): void
    {
      $this->middleware = new MustNotLoginMiddleware();
      putenv("mode=test");

      $this->userRepository = new UserRepository(Database::getConnection());
      $this->sessionRepository = new SessionRepository(Database::getConnection());

      $this->sessionRepository->deleteAll();
      $this->userRepository->deleteAll();
    }

    public function testBeforeGuest()
    {
      $this->middleware->before();
      $this->expectOutputString("");
    }

    public function testBeforeLoginUser()
    {
      $user = new User();
      $user->id = 'insani';
      $user->name = 'Insani';
      $user->password = 'insani';
      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->middleware->before();
      $this->expectOutputRegex("[Location: /]");
    }
  }
}
