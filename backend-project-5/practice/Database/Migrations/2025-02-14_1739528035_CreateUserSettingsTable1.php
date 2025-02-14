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
        metaKey VARCHAR(255) NOT NULL,
        metaValue VARCHAR(255) NOT NULL,
        user_id BIGINT,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
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
