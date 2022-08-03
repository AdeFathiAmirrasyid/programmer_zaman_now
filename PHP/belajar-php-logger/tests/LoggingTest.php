<?php

namespace Mvc\BelajarPhpMvc;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class LoggingTest extends TestCase
{
  public function testLogging()
  {
    $logger = new Logger(HandlerTest::class);
    $logger->pushHandler(new StreamHandler("php://stderr"));
    $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
    $logger->info("Belajar Pemprograman Logging");
    $logger->info("Selamat Datang di Programmer Zaman Now");
    $logger->info("Ini Infrmasi Aplikasi Logging");
    self::assertNotNull($logger);
    self::assertEquals(2, sizeof($logger->getHandlers()));
  }
}
