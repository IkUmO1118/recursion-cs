<?php

namespace Persons\Employees;
use Persons\Person;

class Employee extends Person {
  public int $employeeId;
  public float $salary;

  public function __construct(string $name, int $age, string $address, int $employeeId, float $salary) {
    $this->employeeId = $employeeId;
    $this->salary = $salary;
    parent::__construct($name, $age, $address);
  }
}