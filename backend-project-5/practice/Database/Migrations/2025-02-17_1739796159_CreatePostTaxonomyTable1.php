<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreatePostTaxonomyTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE IF NOT EXISTS postTaxonomies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        post_id INT,
        taxonomy_id INT,
        CONSTRAINT fk_postTaxonomies_posts FOREIGN KEY (post_id) REFERENCES posts(id),
        CONSTRAINT fk_postTaxonomies_taxonomyTerms FOREIGN KEY (taxonomy_id) REFERENCES taxonomyTerms(id)
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE postTaxonomies"
    ];
  }
}
