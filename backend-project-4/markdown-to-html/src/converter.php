<?php
require __DIR__ . '/../vendor/autoload.php';

$Parsedown = new Parsedown();
echo $Parsedown->text('Hello, **world**!');