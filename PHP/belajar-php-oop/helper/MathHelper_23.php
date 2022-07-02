<?php

namespace Helper;

class MathHelper
{
  public static string $name = "MathHelper";

  public static function sum(int ...$numbers): int
  {
    $total = 0;
    foreach ($numbers as $number) {
      $total += $number;
    }
    return $total;
  }
}
