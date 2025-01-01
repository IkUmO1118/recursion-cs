<?php
require __DIR__ . './../vendor/autoload.php';
use function Jawira\PlantUml\encodep;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$json = file_get_contents('php://input');
$data = json_decode($json,true);

$format = $data['format'];
$text = $data['text'];

$encode = encodep($text);

echo "https://www.plantuml.com/plantuml/{$format}/{$encode}";