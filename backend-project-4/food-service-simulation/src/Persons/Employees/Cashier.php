<?php

namespace Persons\Employees;
use \Persons\Employees\Employee;

class Cashier extends Employee {
  public function __construct(string $name, int $age, string $address, int $employeeId, float $salary) {
    parent::__construct( $name, $age, $address, $employeeId, $salary);
  }

  // public function generateOrder(string[] categories, Restaurant restaurant): FoodOrder {}
  // public function generateInvoice(FoodOrder order): Invoice {}
}