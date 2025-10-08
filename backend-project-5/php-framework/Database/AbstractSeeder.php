<?php

namespace Database;

use Database\MySQLWrapper;

abstract class AbstractSeeder implements Seeder
{
  protected MySQLWrapper $conn;
  protected ?string $tableName = null;

  protected array $tableColumns = [];

  const AVAILABLE_TYPES = [
    'int' => 'i',
    'float' => 'd',
    'string' => 's'
  ];

  public function __construct(MySQLWrapper $conn)
  {
    $this->conn = $conn;
  }

  public function seed(): void
  {
    $data = $this->createRowData();

    if ($this->tableName === null) throw new \Exception('Class requires a table name');
    if (empty($this->tableColumns)) throw new \Exception('Class requires a olumns');

    foreach ($data as $row) {
      // 行を検証し、問題がなければ行を挿入します。 
      $this->validateRow($row);
      $this->insertRow($row);
    }
  }

  // 各行をtableColumnsと照らし合わせて検証します。
  protected function validateRow(array $row): void
  {
    if (count($row) !== count($this->tableColumns)) {
      throw new \Exception('Row does not match the table columns.');
    }

    foreach ($row as $i => $value) {
      $columnDataType = $this->tableColumns[$i]['data_type'];
      $columnName     = $this->tableColumns[$i]['column_name'];

      if (!isset(static::AVAILABLE_TYPES[$columnDataType])) {
        throw new \InvalidArgumentException(sprintf(
          "The data type %s is not an available data type.",
          $columnDataType
        ));
      }

      // PHPは、値のデータタイプを返すget_debug_type()関数とgettype()関数の両方を提供しています。
      // クラス名でも機能します。詳細は https://www.php.net/manual/en/function/get-debug-type.php を参照してください。
      // get_debug_typeはネイティブのPHP 8タイプを返します。例えば、gettype(4.5)はネイティブのデータタイプ'float'ではなく、文字列'double'を返します。
      if (get_debug_type($value) !== $columnDataType) {
        throw new \InvalidArgumentException(sprintf(
          "Value for %s should be of type %s. Here is the current value: %s",
          $columnName,
          $columnDataType,
          json_encode($value)
        ));
      }
    }
  }

  // 各行をテーブルに挿入します。$tableColumnsはデータタイプとカラム名を取得するために使用されます。
  protected function insertRow(array $row): void
  {
    // カラム名を取得します。
    $columnNames = array_map(function ($columnInfo) {
      return $columnInfo['column_name'];
    }, $this->tableColumns);

    // クエリを準備する際、count($row)個のプレースホルダー '?' を生成します。
    // bind_param関数はこれらにデータを挿入します。
    $placeholders = str_repeat('?,', count($row) - 1) . '?';

    $sql = sprintf(
      'INSERT INTO %s (%s) VALUES (%s)',
      $this->tableName,
      implode(', ', $columnNames),
      $placeholders
    );

    $stmt = $this->conn->prepare($sql);

    // AVAILABLE_TYPESを用いて各カラムのデータ型指定文字列を生成します。
    $dataTypes = implode('', array_map(function ($columnInfo) {
      return static::AVAILABLE_TYPES[$columnInfo['data_type']];
    }, $this->tableColumns));

    // bind_paramは、指定したデータ型の文字列と値の配列を受け取ります。
    // 例：$stmt->bind_param('iss', ...array_values([1, 'John', 'john@example.com']))
    $stmt->bind_param($dataTypes, ...array_values($row));
    $stmt->execute();
  }
}
