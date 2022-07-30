<?php

namespace Mvc\BelajarPhpMvc\Controller;

use Mvc\BelajarPhpMvc\App\View;
use Mvc\BelajarPhpMvc\Config\Database;
use Mvc\BelajarPhpMvc\Repository\SessionRepository;
use Mvc\BelajarPhpMvc\Repository\UserRepository;
use Mvc\BelajarPhpMvc\Service\SessionService;

class HomeController
{
  private SessionService $sessionService;
  public function __construct()
  {
    $connection = Database::getConnection();
    $sessionRepository = new SessionRepository($connection);
    $userRepository = new UserRepository($connection);
    $this->sessionService = new SessionService($sessionRepository, $userRepository);
  }
  function index(): void
  {
    $user = $this->sessionService->current();
    if ($user == null) {
      View::render('Home/index', [
        "title" => "PHP Login Management",
      ]);
    } else {
      View::render('Home/dashboard', [
        "title" => "dashboard",
        "user" => [
          "name" => $user->name
        ]
      ]);
    }
  }
}
