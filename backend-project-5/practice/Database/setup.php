<?php

namespace Database;

use Database\MySQLWrapper;
use Exception;

$mysqli = new MySQLWrapper();

$sqlFiles = [
  __DIR__ . '/Examples/users-setup.sql',
  __DIR__ . '/Examples/posts-setup.sql',
  __DIR__ . '/Examples/postLikes-setup.sql',
  __DIR__ . '/Examples/comments-setup.sql',
  __DIR__ . '/Examples/commentLikes-setup.sql'
];

foreach ($sqlFiles as $filePath) {
  $result = $mysqli->query(file_get_contents($filePath));
  if ($result === false) {
    throw new Exception("Could not execute query" . $mysqli->error);
  }
}
echo "Successfully ran all SQL setup queries." . PHP_EOL;
