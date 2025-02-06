<?php

use Database\MySQLWrapper;

$mysqli = new MySQLWrapper();

$result = $mysqli->query(file_get_contents(__DIR__ . '/Examples/users-setup.sql'));
if ($result === false) throw new Exception('Could not execute query.');

$result = $mysqli->query(file_get_contents(__DIR__ . '/Examples/posts-setup.sql'));
if ($result === false) throw new Exception('Could not execute query.');

$result = $mysqli->query(file_get_contents(__DIR__ . '/Examples/postLikes-setup.sql'));
if ($result === false) throw new Exception('Could not execute query.');

$result = $mysqli->query(file_get_contents(__DIR__ . '/Examples/comments-setup.sql'));
if ($result === false) throw new Exception('Could not execute query.');

$result = $mysqli->query(file_get_contents(__DIR__ . '/Examples/commentLikes-setup.sql'));
if ($result === false) throw new Exception('Could not execute query.');

print("Successfully ran all SQL setup queries." . PHP_EOL);
