<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class UpdateUserTable2 implements SchemaMigration
{
  public function up(): array
  {
    // マイグレーションロジックをここに追加してください
    return [
      "ALTER TABLE users
        DROP COLUMN subscription,
        DROP COLUMN subscription_status,
        DROP COLUMN subscriptionCreatedAt,
        DROP COLUMN subscriptionEndsAt
      "
    ];
  }
  public function down(): array
  {
    // ロールバックロジックを追加してください
    return [
      "ALTER TABLE users
        ADD COLUMN subscription VARCHAR(255),
        ADD COLUMN subscription_status VARCHAR(255),
        ADD COLUMN subscriptionCreatedAt DATETIME,
        ADD COLUMN subscriptionEndsAt DATETIME
      "
    ];
  }
}
