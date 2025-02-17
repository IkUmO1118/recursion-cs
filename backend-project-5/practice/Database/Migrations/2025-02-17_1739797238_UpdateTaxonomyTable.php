<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class UpdateTaxonomyTable implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "ALTER TABLE taxonomies CHANGE taxonomyuName taxonomyName VARCHAR(255) NOT NULL"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      ""
    ];
  }
}
