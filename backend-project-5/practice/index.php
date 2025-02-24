<?php

spl_autoload_extensions(".php");
spl_autoload_register();
require __DIR__ . '/vendor/autoload.php';

$routes = include('Routing/routes.php');

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = ltrim($path, "/");

if (isset($routes[$path])) {
  $view = $routes[$path];
  $viewPath = sprintf("%s/Views/%s.php", __DIR__, $view);

  if (file_exists($viewPath)) {
    include "Views/layout/header.php";
    include $viewPath;
    include "Views/layout/footer.php";
  } else {
    http_response_code(500);
    printf("<br>debug info:<br>%s<br>%s", "Internal error, please contact the admin.");
  }
} else {
  http_response_code(404);
  echo "404 Not Found:The requested route was found on this server";
  printf("<br>debug info:<br>%s<br>%s", json_encode($routes), $path);
}
