<?php

namespace Persons\Employees;

use FoodOrders\FoodOrder;
use \Persons\Employees\Employee;

class Cashier extends Employee {
  public function __construct(string $name, int $age, string $address, int $employeeId, float $salary) {
    parent::__construct( $name, $age, $address, $employeeId, $salary);
  }

  public function generateOrder(array $categories, array $menus) {
    echo "{$this->name} received the order.".PHP_EOL;
    $foodItems = [];
    foreach($categories as $category => $count) {
      while($count > 0) {
        $foodItems[] = new $menus[$category];
        $count--;
      }
    }

    return new FoodOrder($foodItems, 20241118);
  }
  // public function generateInvoice(FoodOrder order): Invoice {}
}