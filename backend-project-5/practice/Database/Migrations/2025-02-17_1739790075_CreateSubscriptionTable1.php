<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateSubscriptionTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "CREATE TABLE IF NOT EXISTS subscriptions (
          id INT PRIMARY KEY AUTO_INCREMENT,
          subscription VARCHAR(255),
          subscription_status VARCHAR(255),
          subscriptionCreatedAt DATETIME,
          subscriptionEndsAt DATETIME,
          user_id BIGINT,
          FOREIGN KEY (user_id) REFERENCES users(id)
      )"
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "DROP TABLE subscriptions"
    ];
  }
}
