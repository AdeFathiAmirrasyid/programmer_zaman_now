<?php
interface HelloWorld
{
  function sayHello(): void;
}

// class SampleHelloWorld implements HelloWorld
// {
//   function sayHello(): void
//   {
//     echo "Hello World" . PHP_EOL;
//   }
// }

$helloWorld = new class("Insanie") implements HelloWorld
{
  public string $name;
  public function __construct(string $name)
  {
    $this->name = $name;
  }
  function sayHello(): void
  {
    echo "Hello $this->name" . PHP_EOL;
  }
};
$helloWorld->sayHello();
