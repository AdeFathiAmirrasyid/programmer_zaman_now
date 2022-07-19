<?php

namespace Programmerzamannow\Test;

use Exception;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

  private Person $person;
  protected function setUp(): void
  {
  }

  /**
   * @before
   */
  public function createPerson()
  {
    $this->person = new Person("Insanie");
  }

  public function testSuccess()
  {
    self::assertEquals("Hello Alisia, my name is Insanie", $this->person->sayHello("Alisia"));
  }

  public function testException()
  {
    $this->expectException(Exception::class);
    $this->person->sayHello(null);
  }

  public function testGoodByeSuccess()
  {
    $this->expectOutputString("Good bye Insanie" . PHP_EOL);
    $this->person->sayGoodBye("Insanie");
  }
}
