<?php

namespace Mvc\BelajarPhpMvc\Controller;

class ProductController
{
  function categories(string $productId, string $categoryId): void
  {
    echo "PRODUCT $productId, CATEGORY $categoryId";
  }
}
