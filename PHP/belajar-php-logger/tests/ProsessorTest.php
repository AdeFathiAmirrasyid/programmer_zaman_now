<?php

namespace Mvc\BelajarPhpMvc;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

class ProsessorTest extends TestCase
{
  public function testProsessorRecord()
  {
    $logger = new Logger(ProsessorTest::class);
    $logger->pushHandler(new StreamHandler("php://stderr"));
    $logger->pushProcessor(new GitProcessor());
    $logger->pushProcessor(new MemoryUsageProcessor());
    $logger->pushProcessor(new HostnameProcessor());
    $logger->pushProcessor(function ($record) {
      $record["extra"]["username"] = [
        "firstname" => "Fathie",
        "lastname" => "Insani",
      ];
      return $record;
    });

    $logger->info("Hello World", ["username" => "insani"]);
    $logger->info("Hello World");
    $logger->info("Hello World Lagi");

    self::assertNotNull($logger);
  }
}
