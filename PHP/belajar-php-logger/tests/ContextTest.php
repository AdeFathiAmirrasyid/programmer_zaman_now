<?php

namespace Mvc\BelajarPhpMvc;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class ContextTest extends TestCase
{
  public function testLevel()
  {
    $logger = new Logger(ContextTest::class);
    $logger->pushHandler(new StreamHandler("php://stderr"));
    // $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
    // $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log", Logger::ERROR));

    // $logger->debug("This is debug");
    $logger->info("This is log message", ["username" => "fathie"]);
    $logger->info("Try login user", ["username" => "fathie"]);
    $logger->info("success login user", ["username" => "fathie"]);
    // $logger->notice("This is notice");
    // $logger->warning("This is warning");
    // $logger->error("This is error");
    // $logger->critical("This is critical");
    // $logger->alert("This is alert");
    // $logger->emergency("This is emergency");

    self::assertNotNull($logger);
    // self::assertEquals(2, sizeof($logger->getHandlers()));
  }
}
