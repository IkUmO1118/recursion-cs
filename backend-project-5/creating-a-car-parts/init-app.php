<?php

spl_autoload_register(function ($class) {
  $prefixes = [
      'Helpers\\' => __DIR__ . '/Helpers/',
      'Exceptions\\' => __DIR__ . '/Exceptions/'
  ];

  foreach ($prefixes as $prefix => $base_dir) {
      $len = strlen($prefix);
      if (strncmp($prefix, $class, $len) === 0) {
          $relative_class = substr($class, $len);
          $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
          if (file_exists($file)) {
              require $file;
              return;
          }
      }
  }
});

use Helpers\Settings;

$settings = new Settings();
printf("Local database username: %s\n", $settings->env('DATABASE_USER'));
printf("Local database password (hashed): %s\n", password_hash($settings->env('DATABASE_USER_PASSWORD'), PASSWORD_DEFAULT));

?>