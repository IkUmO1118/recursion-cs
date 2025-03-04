<?php

namespace Helpers;

class ValidationHelper
{
  public static function integer($value, float $min = -INF, float $max = INF)
  {
    $value = filter_var($value, FILTER_VALIDATE_INT, ['min_range' => (int) $min, "max_range" => (int) $max]);

    if ($value === false) throw new \InvalidArgumentException('The provided value is not a valid integer.');

    return $value;
  }

  public static function string(string $value)
  {
    $value = filter_var($value, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

    if ($value === false) throw new \InvalidArgumentException('The provided value is not a valid string.');

    return $value;
  }
}
