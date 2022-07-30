<?php

namespace Mvc\BelajarPhpMvc\App {
  function header(string $value)
  {
    echo $value;
  }
};

namespace Mvc\BelajarPhpMvc\Service {
  function setcookie(string $name, string $value)
  {
    echo "$name: $value";
  }
}
