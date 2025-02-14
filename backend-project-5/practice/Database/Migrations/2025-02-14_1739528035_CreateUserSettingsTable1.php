<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateUserSettingsTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE IF NOT EXISTS userSettings (
        id INT PRIMARY KEY AUTO_INCREMENT,
        userID INT,
        metaKey STRING,
        metaValue STRING,
        FOREIGN KEY (userID) REFERENCES users(userID)
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE userSettings"
    ];
  }
}
