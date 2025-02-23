<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreatePartsTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE parts (
        id INT PRIMARY KEY AUTO_INCREMENT,
        carID INT NOT NULL,
        name VARCHAR(255) NOT NULL,
        description VARCHAR(255) NOT NULL,
        price FLOAT NOT NULL,
        quantityInStock INT NOT NULL,
        CONSTRAINT fk_parts_cars FOREIGN KEY (carID) REFERENCES cars(id)
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE parts"
    ];
  }
}
