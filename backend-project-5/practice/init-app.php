<?php

spl_autoload_extensions(".php");
spl_autoload_register();
require __DIR__ . '/vendor/autoload.php';

use Database\MySQLWrapper;

$opts = getopt('', ['migrate']);
if (isset($opts['migrate'])) {
    printf('Database migration enabled.' . PHP_EOL);

    include('Database/setup.php');
    printf('Database migration ended.' . PHP_EOL);
}

$mysqli = new MySQLWrapper();

$charset = $mysqli->get_charset();

if ($charset === null) throw new Exception('Charset could be read');

printf(
    "%s's charset: %s.%s",
    $mysqli->getDatabaseName(),
    $charset->charset,
    PHP_EOL
);
printf(
    "collation: %s.%s",
    $charset->collation,
    PHP_EOL
);

$mysqli->close();
