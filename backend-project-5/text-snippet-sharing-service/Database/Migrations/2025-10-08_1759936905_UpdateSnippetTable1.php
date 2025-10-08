<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class UpdateSnippetTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "ALTER TABLE snippets MODIFY COLUMN expired_at DATETIME NULL DEFAULT NULL;"
    ];
  }

  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "ALTER TABLE snippets MODIFY COLUMN expired_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;"
    ];
  }
}
