<?php

namespace Database\Seeds;

use Faker\Factory;
use Database\AbstractSeeder;

class PartsSeeder extends AbstractSeeder
{
  // TODO: tableName文字列を割り当ててください。 
  protected ?string $tableName = "parts";

  // TODO: tableColumns配列を割り当ててください。 
  protected array $tableColumns = [
    ['data_type' => 'int', 'column_name' => 'carID'],
    ['data_type' => 'string', 'column_name' => 'name'],
    ['data_type' => 'string', 'column_name' => 'description'],
    ['data_type' => 'float', 'column_name' => 'price'],
    ['data_type' => 'int', 'column_name' => 'quantityInStock'],
  ];

  public function createRowData(): array
  {
    // TODO: createRowData()メソッドを実装してください。 
    $faker = Factory::create();
    $parts = [];
    $carIDs = range(1, 1000); // Assuming car IDs are from 1 to 1000

    for ($i = 0; $i < 100000; $i++) {
      $parts[] = [
        $faker->randomElement($carIDs), // carID
        $faker->word, // name
        $faker->sentence, // description
        $faker->randomFloat(2, 10, 500), // price
        $faker->numberBetween(1, 100), // quantityInStock
      ];
    }

    return $parts;
  }
}
