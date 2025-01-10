<?php

spl_autoload_extensions(".php");
spl_autoload_register();
require __DIR__ . '/vendor/autoload.php';

use Helpers\Settings;

$settings = new Settings();
printf("Local database username: %s\n", $settings->env('DATABASE_USER'));
printf("Local database password (hashed): %s\n", password_hash($settings->env('DATABASE_USER_PASSWORD'), PASSWORD_DEFAULT));
