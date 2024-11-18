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

    for($i=0; $i<$itemCount; $i++) {
      $item = $items[$i];
      echo "{$this->name} was cooking " . $item->getCategory() . PHP_EOL;
    }
  }
}