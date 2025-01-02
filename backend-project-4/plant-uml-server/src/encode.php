<?php
require __DIR__ . './../vendor/autoload.php';
use function Jawira\PlantUml\encodep;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$type = $data['type'];
$format = $data['format'];
$text = $data['text'];

$encode = encodep($text);

if ($type === 'download') {
  if ($format === "png") {
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="userCode.png"');
    readfile("https://www.plantuml.com/plantuml/{$format}/{$encode}");
  } else if ($format === "svg") {
    header('Content-Type: image/svg+xml');
    header('Content-Disposition: attachment; filename="userCode.svg"');
    readfile("https://www.plantuml.com/plantuml/{$format}/{$encode}");
  } else if ($format === "txt") {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="userCode.txt"');
    readfile("https://www.plantuml.com/plantuml/{$format}/{$encode}");
  }
} else {
  if ($format === 'ascii') {
    $url = "https://www.plantuml.com/plantuml/{$format}/{$encode}";
    $response = file_get_contents($url);
    header('Content-Type: text/plain');
    echo $response;
  } else {
    echo "https://www.plantuml.com/plantuml/{$format}/{$encode}";
  }
}