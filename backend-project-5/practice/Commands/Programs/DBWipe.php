<?php

namespace Commands\Programs;

use Commands\AbstractCommand;
use Commands\Argument;

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
    ];
  }
  // TODO: 実行コードを記述してください。
  public function execute(): int
  {
    $backup = $this->getArgumentValue('backup');

    if ($backup) {
      // バックアップを作成
      exec('mysqldump -u username -p dbname > backup.sql', $output, $return_var);
      if ($return_var !== 0) {
        echo "Failed to create backup.\n";
        return $return_var;
      }
      echo "Backup created successfully.\n";
    }

    // データベースをワイプ
    exec('mysql -u username -p -e "DROP DATABASE dbname; CREATE DATABASE dbname;"', $output, $return_var);
    if ($return_var !== 0) {
      echo "Failed to wipe the database.\n";
      return $return_var;
    }

    echo "Database wiped successfully.\n";
    return 0;
  }
}
