<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreatePostTagsTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE IF NOT EXISTS postTags (
        post_id INT,
        tag_id INT,
        PRIMARY KEY (post_id, tag_id),
        CONSTRAINT fk_postTags_posts FOREIGN KEY (post_id) REFERENCES posts(id),
        CONSTRAINT fk_postTags_tags FOREIGN KEY (tag_id) REFERENCES tags(id)
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE postTags"
    ];
  }
}
