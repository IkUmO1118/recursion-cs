<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class UpdateUserTable1 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "ALTER TABLE users
        DROP COLUMN email_confirmed_at
      ",
      "ALTER TABLE users
        ADD COLUMN subscription VARCHAR(255),
        ADD COLUMN subscription_status VARCHAR(255),
        ADD COLUMN subscriptionCreatedAt DATETIME,
        ADD COLUMN subscriptionEndsAt DATETIME
      "
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "ALTER TABLE users
        ADD COLUMN email_confirmed_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
      ",
      "ALTER TABLE users
        DROP COLUMN subscription,
        DROP COLUMN subscription_status,
        DROP COLUMN subscriptionCreatedAt,
        DROP COLUMN subscriptionEndsAt
      "
    ];
  }
}
