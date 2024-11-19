<?php

namespace Persons\Employees;

use FoodOrders\FoodOrder;
use Persons\Employees\Employee;

class Chef extends Employee {
  public function __construct(string $name, int $age, string $address, int $employeeId, float $salary) {
    parent::__construct( $name, $age, $address, $employeeId, $salary);
  }

  public function prerareFood(FoodOrder $order) {
    $items = $order->getItems();
    $itemCount = count($items);

    $estimatedTime = 0;
    for($i=0; $i<$itemCount; $i++) {
      $item = $items[$i];
      $estimatedTime += $item->getPreparationMinTime();
      echo "{$this->name} was cooking " . $item->getCategory() . PHP_EOL;
    }

    echo "{$this->name} took {$estimatedTime} minutes to cook". PHP_EOL;
  }
}