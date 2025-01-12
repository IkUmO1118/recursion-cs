<?php

namespace Database;

use mysqli;
use Helpers\Settings;

class MySQLWrapper extends mysqli
{
  private $settings;
  public function __construct(?string $hostname = 'localhost', ?string $username = null, ?string $password = null, ?string $database =
  null, ?int $port = null, ?string $socket = null)
  {
    /*
    接続の失敗時にエラーを報告し、例外をスローします。データベース接続を初期化する前にこの設定を行ってください。
    テストするには、.env設定で誤った情報を入力します。
    */
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $this->settings = new Settings();

    $username = $username ?? $this->settings->env('DATABASE_USER');
    $password = $password ?? $this->settings->env('DATABASE_USER_PASSWORD');
    $database = $database ?? $this->settings->env('DATABASE_NAME');
    parent::__construct($hostname, $username, $password, $database, $port, $socket);
  }
  // クエリが問い合わせられるデフォルトのデータベースを取得します。
  // エラーは失敗時にスローされます(つまり、クエリがfalseを返す、または取得された行がない)
  // これらに対処するためにifブロックやcatch文を使用することもできます。
  public function getDatabaseName(): string
  {
    return $this->query("SELECT database() AS the_db")->fetch_row()[0];
  }
}
