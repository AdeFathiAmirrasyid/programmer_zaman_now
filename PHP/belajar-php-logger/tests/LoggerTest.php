<?php

namespace Mvc\BelajarPhpMvc;

use Monolog\Logger;
use Monolog\Test\TestCase;

class LoggerTest extends TestCase
{
  public function testLogger()
  {
    $logger = new Logger("fathie_insanie");
    self::assertNotNull($logger);
  }

  public function testLoggerWithName()
  {
    $logger = new Logger(LoggerTest::class);
    self::assertNotNull($logger);
  }
}
