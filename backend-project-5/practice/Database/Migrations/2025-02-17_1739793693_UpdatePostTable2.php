<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class UpdatePostTable2 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "ALTER TABLE posts
        DROP FOREIGN KEY fk_posts_category,
        DROP COLUMN category_id
      "
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "ALTER TABLE posts
        ADD COLUMN category_id INT,
        ADD CONSTRAINT fk_posts_category FOREIGN KEY (category_id) REFERENCES categories(id)
      ",
    ];
  }
}
