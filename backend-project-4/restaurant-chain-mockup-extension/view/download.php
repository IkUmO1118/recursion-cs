<?php

require_once './../vendor/autoload.php';

use Helpers\DownloadRandomGenerator;

// POSTリクエストからパラメータを取得
$chains = $_POST['numberOfChains'] ?? 2;
$employees = $_POST['numberOfChains'] ?? 2;
$minSalary = $_POST['minSalary'] ?? 1;
$maxSalary = $_POST['maxSalary'] ?? 10;
$locations = $_POST['numberOfLocations'] ?? 2;
$format = $_POST['format'] ?? 'html';

// パラメータが正しい形式であることを確認
$chains = (int)$chains;
$employees = (int)$employees;
$minSalary = (int)$minSalary;
$maxSalary = (int)$maxSalary;
$locations = (int)$locations;

if (is_null($chains) || is_null($employees) || is_null($minSalary) || is_null($maxSalary) || is_null($locations) || is_null($format)) {
  exit('Missing parameters.');
}

if (!is_numeric($chains) || $chains < 1 || $chains > 100) {
  http_response_code(412);
  exit('Invalid count. Must be a number between 1 and 100.');
}
if (!is_numeric($employees) || $employees < 1 || $employees > 100) {
  http_response_code(412);
  exit('Invalid count. Must be a number between 1 and 100.');
}
if (!is_numeric($minSalary) || $minSalary < 1 || $minSalary > 9999) {
  http_response_code(412);
  exit('Invalid count. Must be a number between 1 and 9999.');
}
if (!is_numeric($maxSalary) || $maxSalary < 1 || $maxSalary > 9999) {
  http_response_code(412);
  exit('Invalid count. Must be a number between 1 and 9999.');
}
if (!is_numeric($locations) || $locations < 1 || $locations > 10) {
  http_response_code(412);
  exit('Invalid count. Must be a number between 1 and 10.');
}

$allowedFormats = ['json', 'txt', 'html', 'md'];
if (!in_array($format, $allowedFormats)) {
  http_response_code(412);
  exit('Invalid type. Must be one of: ' . implode(', ', $allowedFormats));
}

$restaurantChains = DownloadRandomGenerator::downloadRestaurantChains(
  $chains,
  $employees,
  $locations,
  $minSalary,
  $maxSalary,
);

match ($format) {
  "md" => toMarkdown($restaurantChains),
  "json" => toJson($restaurantChains),
  "txt" => toText($restaurantChains),
  default => toHTML($restaurantChains)
};

function toMarkdown($restaurantChains)
{
  header('Content-Type: text/markdown');
  header('Content-Disposition: attachment; filename="restaurant_chains.md"');
  foreach ($restaurantChains as $user) {
    echo $user->toMarkdown();
  }
}

function toJson($restaurantChains)
{
  header('Content-Type: application/json');
  header('Content-Disposition: attachment; filename="restaurant_chains.json"');
  $userArray = array_map(fn($user) => $user->toArray(), $restaurantChains);
  echo json_encode($userArray);
}

function toText($restaurantChains)
{
  header('Content-Type: text/plain');
  header('Content-Disposition: attachment; filename="restaurant_chains.txt"');
  foreach ($restaurantChains as $user) {
    echo $user->toString();
  }
}

function toHTML($restaurantChains)
{
  $HTMLheader = "
<!DOCTYPE>
<html>
  <head>
      <meta charset='utf-8' />
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Random Restaurant Chain</title>
      <link rel='stylesheet' href='../css/styles.css' type='text/css'>
  </head>
";

  header('Content-Type: text/html');

  echo $HTMLheader;
  foreach ($restaurantChains as $user) {
    echo $user->toHTML();
  }
  echo "</html>";
}
