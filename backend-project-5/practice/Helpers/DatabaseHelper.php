<?php

namespace Helpers;

use Database\MySQLWrapper;
use Exception;

class DatabaseHelper
{
  public static function getRandomComputerPart(): array
  {
    $db = new MySQLWrapper();

    $stmt = $db->prepare('SELECT * FROM computer_parts ORDER BY RAND() LIMIT 1');
    $stmt->execute();
    $result = $stmt->get_result();
    $part = $result->fetch_assoc();

    if (!$part) throw new Exception("Could not find a single part in database");

    return $part;
  }

  public static function getComputerPartById(int $id): array
  {
    $db = new MySQLWrapper();

    $stmt = $db->prepare('SELECT * FROM computer_parts WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $part = $result->fetch_assoc();

    if (!$part) throw new Exception("Could not find a single part in database");

    return $part;
  }

  public static function getComputerPartByType(string $type, int $page, int $perpage): array
  {
    $db = new MySQLWrapper();

    $stmt = $db->prepare('SELECT * FROM computer_parts WHERE type = ? LIMIT ? OFFSET ?');
    $offset = ($page - 1) * $perpage;
    $stmt->bind_param('sii', $type, $perpage, $offset);
    $stmt->execute();

    $result = $stmt->get_result();
    $parts = $result->fetch_all(MYSQLI_ASSOC);

    if (!$parts) throw new Exception("Could not find a single part in database");

    return $parts;
  }

  public static function getNewestComputerParts(int $page, int $perpage): array
  {
    $db = new MySQLWrapper();

    $stmt = $db->prepare('SELECT * FROM computer_parts ORDER BY created_at DESC LIMIT ? OFFSET ?');

    $offset = ($page - 1) * $perpage;
    $stmt->bind_param('ii', $perpage, $offset);
    $stmt->execute();

    $result = $stmt->get_result();
    $parts = $result->fetch_all(MYSQLI_ASSOC);
    if (!$parts) throw new Exception("Could not find a single part in database");

    return $parts;
  }

  public static function getComputerPartByPerformance(string $type, string $order): array
  {
    $db = new MySQLWrapper();

    $order = strtoupper($order) === 'ASC' ? 'ASC' : 'DESC';

    $stmt = $db->prepare("SELECT * FROM computer_parts WHERE type = ? ORDER BY performance_score $order LIMIT ?");
    $limit = 50;
    $stmt->bind_param('si', $type, $limit);
    $stmt->execute();

    $result = $stmt->get_result();
    $parts = $result->fetch_all(MYSQLI_ASSOC);

    if (!$parts) throw new Exception("Could not find a single part in database");

    return $parts;
  }
}
