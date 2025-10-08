<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateSnippetTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "
      CREATE TABLE snippets (
        id INT NOT NULL AUTO_INCREMENT,
        snippet VARCHAR(255) NOT NULL,
        url VARCHAR(255) NOT NULL,
        language VARCHAR(255) NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        expired_at DATETIME DEFAULT NULL,
        PRIMARY KEY (id)
      );
    "
    ];
  }

  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [];
  }
}
