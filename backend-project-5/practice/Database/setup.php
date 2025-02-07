<?php

use Database\MySQLWrapper;

$mysqli = new MySQLWrapper();

$sqlFiles = [
  __DIR__ . '/Examples/users-setup.sql',
  __DIR__ . '/Examples/posts-setup.sql',
  __DIR__ . '/Examples/postLikes-setup.sql',
  __DIR__ . '/Examples/comments-setup.sql',
  __DIR__ . '/Examples/commentLikes-setup.sql'
];

// foreach ($sqlFiles as $filePath) {
//   $result = $mysqli->query(file_get_contents($filePath));
//   if ($result === false) {
//     throw new Exception("Could not execute query" . $mysqli->error);
//   }
// }
// echo "Successfully ran all SQL setup queries." . PHP_EOL;

// $insertData = [
//   "INSERT INTO users (username, email, password, email_confirmed_at, created_at, updated_at) VALUES ('user1', 'test@example.com', 'password', 'test@example.com', NOW(), NOW());",
//   "INSERT INTO posts (title, content, created_at, updated_at, userID) VALUES ('Post 1', 'Content of post 1', NOW(), NOW(), 1);",
//   "INSERT INTO comments (commentText, created_at, updated_at, userID, postID) VALUES ('Comment 1', NOW(), NOW(), 1, 1);",
//   "INSERT INTO postLikes (userID, postID) VALUES (1, 1);",
//   "INSERT INTO commentLikes (userID, commentID) VALUES (1, 1);"
// ];

// foreach ($insertData as $query) {
//   $result = $mysqli->query($query);
//   if ($result === false) {
//     throw new Exception("Could not execute insert query: " . $mysqli->error);
//   }
// }
// echo "Successfully ran all insert SQL queries." . PHP_EOL;

$result = $mysqli->query(
  "ALTER TABLE commentLikes
  DROP FOREIGN KEY commentLikes_ibfk_2;"
);
if ($result === false) {
  throw new Exception("Could not execute query to drop foreign key: " . $mysqli->error);
}

$result = $mysqli->query(
  "ALTER TABLE commentLikes
  DROP COLUMN commentID;"
);
if ($result === false) {
  throw new Exception("Could not execute query" . $mysqli->error);
}
echo "Successfully ran all SQL setup queries." . PHP_EOL;
