<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateTaxonomyTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE IF NOT EXISTS taxonomies (
        id INT PRIMARY KEY AUTO_INCREMENT,
        taxonomyuName VARCHAR(255) NOT NULL,
        description VARCHAR(255) NOT NULL
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE taxonomies"
    ];
  }
}
