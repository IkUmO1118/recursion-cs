<?php

spl_autoload_extensions(".php");
spl_autoload_register();
require __DIR__ . '/vendor/autoload.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  exit(0);
}

$DEBUG = true;

$routes = include('Routing/routes.php');

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = ltrim($path, "/");

if (isset($routes[$path])) {
  $renderer = $routes[$path]();

  try {
    foreach ($renderer->getFields() as $name => $value) {
      $sanitized_value = htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

      if ($sanitized_value && $sanitized_value === $value) {
        header("{$name}: {$sanitized_value}");
      } else {
        http_response_code(500);
        if ($DEBUG) print("Failed settingheader - original: '$value', sanitized: ''$sanitized_value");
        exit;
      }

      print($renderer->getContent());
    }
  } catch (Exception $e) {
    http_response_code(500);
    print("Intenal error, please contact the admin.<br>");
    if ($DEBUG) print($e->getMessage());
  }
} else {
  http_response_code(404);
  echo "404 Not Found: The requested route was not found on this server.";
}
