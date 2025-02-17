<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateTaxonomyTermTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE IF NOT EXISTS taxonomyTerms (
        id INT AUTO_INCREMENT PRIMARY KEY,
        taxonomyTermName VARCHAR(255) NOT NULL,
        taxonomyType_id INT,
        description VARCHAR(255) NOT NULL,
        parentTaxonomyTerm INT,
        CONSTRAINT fk_taxonomyTerms_taxonomies FOREIGN KEY (taxonomyType_id) REFERENCES taxonomies(id)
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE taxonomyTerms"
    ];
  }
}
