<?php
class Student
{
  public string $id;
  public string $name;
  public int $value;
  private string $simple;

  public function setSample(string $sample): void
  {
    $this->sample = $sample;
  }

  public function __clone()
  {
    unset($this->sample);
  }

  public function __toString()
  {
    return "Student id:$this->id, name:$this->name, value:$this->value";
  }

  public function __invoke(...$argument): void
  {
    $join = join(",", $argument);
    echo "Invoke student with arguments $join" . PHP_EOL;
  }

  public function __debugInfo()
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "value" => $this->value,
      "sample" => $this->sample,
      "author" => "Fathie_Insanie",
      "version" => "1.0.0",
    ];
  }
}
