<?php

namespace Restaurants;

use FoodItems\FoodItem;
use Persons\Employees\Employee;

class Restaurant {
  /** @var FoodItem[] */
  public array $foodItems;

  /** @var Employee[] */
  public array $employees;
  public function __construct(array $foodItems, array $employees) {
    $this->foodItems = $foodItems;
    $this->employees = $employees;
  }

  // public function order(array categories): Invoice {

  // }
}