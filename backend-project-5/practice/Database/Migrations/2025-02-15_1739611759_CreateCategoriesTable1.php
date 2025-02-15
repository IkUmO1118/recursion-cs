<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateCategoriesTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE IF NOT EXISTS categories (
        id INT PRIMARY KEY AUTO_INCREMENT,
        categoryName VARCHAR(255) NOT NULL
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE categories"
    ];
  }
}
