<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class DeletePostTagTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "ALTER TABLE postTags
        DROP FOREIGN KEY fk_postTags_posts,
        DROP FOREIGN KEY fk_postTags_tags
      ",

      "DROP TABLE postTags"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [];
  }
}
