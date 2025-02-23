<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateCarsTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE cars (
        id INT AUTO_INCREMENT PRIMARY KEY,
        make VARCHAR(255) NOT NULL,
        model VARCHAR(255) NOT NULL,
        year INT NOT NULL,
        color VARCHAR(255) NOT NULL,
        price FLOAT NOT NULL,
        mileage FLOAT NOT NULL,
        transmission VARCHAR(255) NOT NULL,
        engine VARCHAR(255) NOT NULL,
        status VARCHAR(255) NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE cars"
    ];
  }
}
