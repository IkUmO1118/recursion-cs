<?php

namespace Helpers;

use Database\MySQLWrapper;
use Exception;

class DatabaseHelper
{
  public static function insertSnippet(string $snippet, string $lang,): string
  {
    $db = new MySQLWrapper();

    $stmt = $db->prepare("INSERT INTO snippets (snippet, lang, expired_at) VALUES (?, ?, ?)");
  }
}
