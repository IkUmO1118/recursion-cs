<?php

namespace Database\Seeds;

use Faker\Factory;
use Database\AbstractSeeder;

class ComputerPartsSeeder extends AbstractSeeder
{
  protected ?string $tableName = 'computer_parts';
  protected array $tableColumns = [
    [
      'data_type'   => 'string',
      'column_name' => 'name'
    ],
    [
      'data_type'   => 'string',
      'column_name' => 'type'
    ],
    [
      'data_type'   => 'string',
      'column_name' => 'brand'
    ],
    [
      'data_type'   => 'string',
      'column_name' => 'model_number'
    ],
    [
      'data_type'   => 'string',
      'column_name' => 'release_date'
    ],
    [
      'data_type'   => 'string',
      'column_name' => 'description'
    ],
    [
      'data_type'   => 'int',
      'column_name' => 'performance_score'
    ],
    [
      'data_type'   => 'float',
      'column_name' => 'market_price'
    ],
    [
      'data_type'   => 'float',
      'column_name' => 'rsm'
    ],
    [
      'data_type'   => 'float',
      'column_name' => 'power_consumptionw'
    ],
    [
      'data_type'   => 'float',
      'column_name' => 'lengthm'
    ],
    [
      'data_type'   => 'float',
      'column_name' => 'widthm'
    ],
    [
      'data_type'   => 'float',
      'column_name' => 'heightm'
    ],
    [
      'data_type'   => 'int',
      'column_name' => 'lifespan'
    ]
  ];

  public function createRowData(): array
  {
    $faker = Factory::create();
    $computerParts = [];

    // Determine a random number of entries between 0 and 1000
    $numberOfEntries = $faker->numberBetween(0, 1000);

    for ($i = 0; $i < $numberOfEntries; $i++) {
      $computerParts[] = [
        $faker->word, // name
        $faker->randomElement(['CPU', 'GPU', 'SSD', 'RAM', 'Motherboard', 'Power Supply', 'Cooling Fan']), // type
        $faker->company, // brand
        strtoupper($faker->bothify('??###')), // model_number
        $faker->date('Y-m-d'), // release_date
        $faker->sentence, // description
        $faker->numberBetween(1, 100), // performance_score
        $faker->randomFloat(2, 50, 2000), // market_price
        $faker->randomFloat(2, 0.01, 0.10), // rsm
        $faker->randomFloat(2, 50, 500), // power_consumptionw
        $faker->randomFloat(3, 0.05, 0.50), // lengthm
        $faker->randomFloat(3, 0.05, 0.50), // widthm
        $faker->randomFloat(3, 0.01, 0.10), // heightm
        $faker->numberBetween(1, 10), // lifespan
      ];
    }

    return $computerParts;
  }
}
