<?php

namespace Mvc\BelajarPhpMvc\Service;

require_once __DIR__ . '/../Helper/helper.php';

use Mvc\BelajarPhpMvc\Config\Database;
use Mvc\BelajarPhpMvc\Domain\Session;
use Mvc\BelajarPhpMvc\Domain\User;
use Mvc\BelajarPhpMvc\Repository\SessionRepository;
use Mvc\BelajarPhpMvc\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class SessionServiceTest extends TestCase
{
  private SessionService $sessionService;
  private SessionRepository $sessionRepository;
  private UserRepository $userRepository;

  protected function setUp(): void
  {
    $this->sessionRepository = new SessionRepository(Database::getConnection());
    $this->userRepository = new UserRepository(Database::getConnection());
    $this->sessionService = new SessionService($this->sessionRepository, $this->userRepository);
    $this->sessionRepository->deleteAll();
    $this->userRepository->deleteAll();


    $user = new User();
    $user->id = "insani";
    $user->name = "insani";
    $user->password = "insani";
    $this->userRepository->save($user);
  }

  public function testCreate()
  {
    $session = $this->sessionService->create("insani");
    $this->expectOutputRegex("[X-PZN-SESSION: $session->id]");
    $result = $this->sessionRepository->findById($session->id);
    self::assertEquals("insani", $result->userId);
  }

  public function testDestroy()
  {
    $session = new Session();
    $session->id = uniqid();
    $session->userId = "insani";
    $this->sessionRepository->save($session);
    $this->sessionService->destroy();
    $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;
    $this->sessionService->destroy();
    $this->expectOutputRegex('[X-PZN-SESSION: ]');
    $result = $this->sessionRepository->findById($session->id);
    self::assertNull($result);
  }

  public function testCurrent()
  {
    $session = new Session();
    $session->id = uniqid();
    $session->userId = "insani";
    $this->sessionRepository->save($session);
    $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

    $user = $this->sessionService->current();
    self::assertEquals($session->userId, $user->id);
  }
}
