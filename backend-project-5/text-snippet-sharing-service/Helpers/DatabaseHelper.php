<?php

namespace Helpers;

use Database\MySQLWrapper;
use Exception;

class DatabaseHelper
{
  public static function insertSnippet(string $snippet, string $language, string $duration): string
  {
    $db = new MySQLWrapper();
    $settings = new Settings();
    $baseUrl = rtrim($settings->env('APP_URL'), '/');

    if ($duration === 'never') {
      $expiredAt = null;
    } else {
      $expiredAt = (new \DateTime())->modify("+$duration")->format('Y-m-d H:i:s');
    }

    $urlHash = hash('sha256', uniqid((string)mt_rand(), true));
    $url = rtrim($baseUrl, '/') . '/snippet/' . $urlHash;

    $stmt = $db->prepare("INSERT INTO snippets (snippet, url, language, expired_at) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $snippet, $url, $language, $expiredAt);

    if (!$stmt->execute()) {
      throw new Exception("Failed to insert snippet: " . $stmt->error);
    }

    $stmt->close();

    return $url;
  }

  public static function getSnippetById(string $uniqueId): ?array
  {
    $db = new MySQLWrapper();

    $url = rtrim((new Settings())->env('APP_URL'), '/') . '/snippet/' . $uniqueId;

    $stmt = $db->prepare("SELECT * FROM snippets WHERE url = ? AND (expired_at IS NULL OR expired_at > NOW())");

    $stmt->bind_param("s", $url);

    $stmt->execute();
    $result = $stmt->get_result();
    $snippetData = $result->fetch_assoc();

    $stmt->close();

    return $snippetData ?: null;
  }
}
