<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateCommentLikesTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE IF NOT EXISTS commentLikes (
        user_id BIGINT,
        comment_id INT,
        PRIMARY KEY (user_id, comment_id),
        CONSTRAINT fk_commentLikes_users FOREIGN KEY (user_id) REFERENCES users(id),
        CONSTRAINT fk_commentLikes_comments FOREIGN KEY (comment_id) REFERENCES comments(id)
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE commentLikes"
    ];
  }
}
