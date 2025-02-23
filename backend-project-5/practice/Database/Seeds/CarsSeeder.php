<?php

namespace Database\Seeds;

use Faker\Factory;
use Database\AbstractSeeder;

class CarsSeeder extends AbstractSeeder
{
  // TODO: tableName文字列を割り当ててください。 
  protected ?string $tableName = "cars";

  // TODO: tableColumns配列を割り当ててください。 
  protected array $tableColumns = [
    ['data_type' => 'string', 'column_name' => 'make'],
    ['data_type' => 'string', 'column_name' => 'model'],
    ['data_type' => 'int', 'column_name' => 'year'],
    ['data_type' => 'string', 'column_name' => 'color'],
    ['data_type' => 'float', 'column_name' => 'price'],
    ['data_type' => 'float', 'column_name' => 'mileage'],
    ['data_type' => 'string', 'column_name' => 'transmission'],
    ['data_type' => 'string', 'column_name' => 'engine'],
    ['data_type' => 'string', 'column_name' => 'status'],
  ];

  public function createRowData(): array
  {
    // TODO: createRowData()メソッドを実装してください。 
    $faker = Factory::create();
    $cars = [];

    for ($i = 0; $i < 1000; $i++) {
      $cars[] = [
        $faker->company, // make
        $faker->word,    // model
        (int)$faker->year,    // year
        $faker->safeColorName, // color
        $faker->randomFloat(2, 10000, 50000), // price
        $faker->randomFloat(2, 0, 200000), // mileage
        $faker->randomElement(['Automatic', 'Manual']), // transmission
        $faker->word,    // engine
        $faker->randomElement(['New', 'Used']), // status
      ];
    }

    return $cars;
  }
}
