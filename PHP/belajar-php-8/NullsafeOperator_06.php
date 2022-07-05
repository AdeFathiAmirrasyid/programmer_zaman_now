<?php
class Address
{
  public ?string $country;
}

class User
{
  public ?string $address;
}

function getCountry(?User $user): ?string
{
  return $user?->address?->country;
}

echo getCountry(null) . PHP_EOL;
