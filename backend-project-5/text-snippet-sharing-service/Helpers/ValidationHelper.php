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
    $value = htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    if (trim($value) === '') {
      throw new \InvalidArgumentException('The provided value is not a valid string.');
    }

    return $value;
  }


  public static function getValidatedSnippetFromRequest($snippet)
  {
    if ($snippet === null) throw new \InvalidArgumentException('The "snippet" parameter is required.');

    return self::string($snippet);
  }
}
