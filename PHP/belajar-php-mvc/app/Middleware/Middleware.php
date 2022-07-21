<?php

namespace Mvc\BelajarPhpMvc\Middleware;

interface Middleware
{
  function before(): void;
}
