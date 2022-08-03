<?php

namespace Mvc\BelajarPhpMvc;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class FormatterTest extends TestCase
{
  public function testHandler()
  {
    $logger = new Logger(FormatterTest::class);
    $handler = new StreamHandler("php://stderr");
    $handler->setFormatter(new JsonFormatter());
    $logger->pushHandler($handler);

    $logger->info("Belajar PHP Logging");
    $logger->info("Belajar PHP Logging Lagi");
    self::assertNotNull($logger);
  }
}
