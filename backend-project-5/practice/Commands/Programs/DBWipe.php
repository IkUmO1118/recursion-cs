<?php

namespace Commands\Programs;

use Commands\AbstractCommand;
use Commands\Argument;
use Helpers\Settings;

class DBWipe extends AbstractCommand
{
  protected static ?string $alias = 'db-wipe';

  public static function getArguments(): array
  {
    return [
      (new Argument('backup'))
        ->description('Create a backup before wiping the database')
        ->required(false)
        ->allowAsShort(true),
      (new Argument('restore'))
        ->description('Restore the database from a backup file')
        ->required(false)
        ->allowAsShort(true),
    ];
  }
  // TODO: 実行コードを記述してください。
  public function execute(): int
  {
    $backup = $this->getArgumentValue('backup');
    $restore = $this->getArgumentValue('restore');

    $settings = new Settings();

    $username = $settings->env('DATABASE_USER');
    $password = $settings->env('DATABASE_USER_PASSWORD');
    $database = $settings->env('DATABASE_NAME');

    if ($backup) {
      if (!$this->backupDatabase($username, $password, $database)) {
        return 1;
      }
    }

    if ($restore) {
      if (!$this->restoreDatabase($username, $password, $database)) {
        return 1;
      }
      return 0;
    }

    if (!$this->wipeDatabase($username, $password, $database)) {
      return 1;
    }

    return 0;
  }

  private function backupDatabase(string $username, string $password, string $database): bool
  {
    $backupCommand = sprintf('mysqldump -u %s -p%s %s > backup.sql', $username, $password, $database);
    exec($backupCommand, $output, $return_var);
    if ($return_var !== 0) {
      echo "Failed to create backup.\n";
      return false;
    }
    echo "Backup created successfully.\n";
    return true;
  }

  private function restoreDatabase(string $username, string $password, string $database): bool
  {
    $restoreCommand = sprintf('mysql -u %s -p%s %s < backup.sql', $username, $password, $database);
    exec($restoreCommand, $output, $return_var);
    if ($return_var !== 0) {
      echo "Failed to restore the database.\n";
      return false;
    }
    echo "Database restored successfully.\n";
    return true;
  }

  private function wipeDatabase(string $username, string $password, string $database): bool
  {
    $wipeCommand = sprintf('mysql -u %s -p%s -e "DROP DATABASE %s; CREATE DATABASE %s;"', $username, $password, $database, $database);
    exec($wipeCommand, $output, $return_var);
    if ($return_var !== 0) {
      echo "Failed to wipe the database.\n";
      return false;
    }
    echo "Database wiped successfully.\n";
    return true;
  }
}
