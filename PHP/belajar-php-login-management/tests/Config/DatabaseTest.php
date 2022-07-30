<?php

namespace Mvc\BelajarPhpMvc\Config;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
  public function testGetConnection()
  {
    $connection = Database::getConnection();
    self::assertNotNull($connection);
  }

  public function testGetConnectionSingleton()
  {
    $connsection1 = Database::getConnection();
    $connsection2 = Database::getConnection();
    self::assertSame($connsection1, $connsection2);
  }
}
