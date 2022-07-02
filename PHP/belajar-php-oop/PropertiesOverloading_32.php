<?php
class Zero
{
  private array $properties = [];

  // public string $firstName = "Insani";

  public function __get($name)
  {
    return $this->properties[$name];
  }

  public function __set($name, $value)
  {
    $this->properties[$name] = $value;
  }

  public function __isset($name)
  {
    return isset($this->properties[$name]);
  }

  public function __unset($name)
  {
    unset($this->properties[$name]);
  }

  public function __call($name, $arguments)
  {
    $join = join(",", $arguments);
    echo "Call function $name with arguments $join" . PHP_EOL;
  }

  public static function __callStatic($name, $arguments)
  {
    $join = join(",", $arguments);
    echo "Call static function $name with arguments $join" . PHP_EOL;
  }
}

$zero = new Zero();
$zero->firstName = "Insanie";
$zero->middleName = "Fathie";
$zero->lastName = "Diah";

echo "FirstName : $zero->firstName" . PHP_EOL;
echo "MiddleName : $zero->middleName" . PHP_EOL;
echo "LastName : $zero->lastName" . PHP_EOL;


// isset($zero->firstName);
// unset($zero->firstName);

$zero->sayHello("Diah", "Insanie");
Zero::sayHello("Diah", "Fathie");
