<?php

namespace Mvc\BelajarPhpMvc\Controller;

use Mvc\BelajarPhpMvc\Config\Database;
use Mvc\BelajarPhpMvc\Domain\Session;
use Mvc\BelajarPhpMvc\Domain\User;
use Mvc\BelajarPhpMvc\Repository\SessionRepository;
use Mvc\BelajarPhpMvc\Repository\UserRepository;
use Mvc\BelajarPhpMvc\Service\SessionService;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
  private HomeController $homeController;
  private UserRepository $userRepository;
  private SessionRepository $sessionRepository;

  public function setUp(): void
  {
    $this->homeController = new HomeController();
    $this->sessionRepository = new SessionRepository(Database::getConnection());
    $this->userRepository = new UserRepository(Database::getConnection());

    $this->sessionRepository->deleteAll();
    $this->userRepository->deleteAll();
  }

  public function testGuest()
  {
    $this->homeController->index();
    $this->expectOutputRegex("[Login Management]");
  }

  public function testUserLogin()
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

    $this->homeController->index();
    $this->expectOutputRegex("[Hello Insani]");
  }
}
