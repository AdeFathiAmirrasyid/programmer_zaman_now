<?php

namespace Mvc\BelajarPhpMvc\Middleware;

use Mvc\BelajarPhpMvc\App\View;
use Mvc\BelajarPhpMvc\Config\Database;
use Mvc\BelajarPhpMvc\Repository\SessionRepository;
use Mvc\BelajarPhpMvc\Repository\UserRepository;
use Mvc\BelajarPhpMvc\Service\SessionService;

class MustLoginMiddleware implements Middleware
{
  private SessionService $sessionService;
  public function __construct()
  {
    $sessionRepository = new SessionRepository(Database::getConnection());
    $userRepository = new UserRepository(Database::getConnection());
    $this->sessionService = new SessionService($sessionRepository, $userRepository);
  }

  function before(): void
  {
    $user = $this->sessionService->current();
    if ($user == null) {
      View::redirect('/users/login');
    }
  }
}
