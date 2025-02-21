<?php

use Database\MySQLWrapper;

spl_autoload_extensions(".php");
spl_autoload_register();
require __DIR__ . './../vendor/autoload.php';

$mysqli = new MySQLWrapper();

$charset = $mysqli->get_charset();
if ($charset === null) throw new Exception('Charset could be read');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$query = "SELECT * FROM test_users WHERE username = '$username' AND password = '$password';";
$result = $mysqli->query($query);

if (!$result) {
  echo "クエリの実行に失敗しました: " . $mysqli->error;
  exit;
}

$userData = $result->fetch_assoc();

if ($userData) {
  $login_username = $userData['username'];
  $login_email = $userData['email'];
  $login_role = $userData['role'];

  echo "ログイン成功<br/>";
  echo "こんにちは、$login_username<br/>";
  if ($login_role == 'admin') {
    echo "role: adminでログインしています。<br/>";
    echo "password: $password<br/>";
  }
} else {
  echo "ログイン失敗<br/>";
}
