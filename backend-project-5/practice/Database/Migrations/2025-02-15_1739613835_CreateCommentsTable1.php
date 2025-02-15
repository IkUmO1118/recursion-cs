<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateCommentsTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE IF NOT EXISTS comments (
        id INT PRIMARY KEY AUTO_INCREMENT,
        commentText VARCHAR(255),
        created_at DATE,
        updated_at DATE,
        user_id BIGINT,
        post_id INT,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (post_id) REFERENCES posts(id)
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE comments"
    ];
  }
}
