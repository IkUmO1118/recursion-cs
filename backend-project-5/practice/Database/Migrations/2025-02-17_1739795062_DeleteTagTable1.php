<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class DeleteTagTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "DROP TABLE tags"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "CREATE TABLE IF NOT EXISTS tags (
        id INT PRIMARY KEY AUTO_INCREMENT,
        tagName VARCHAR(255)
      )"
    ];
  }
}
