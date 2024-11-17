<?php

namespace Restaurants;

use FoodItems\FoodItem;
use Persons\Employees\Employee;

class Restaurant {
  public array $menu;
  public array $menuMap = [];

  public array $employees;
  public function __construct(array $menu, array $employees) {
    $this->menu = $menu;
    $this->employees = $employees;
    $this->menuMap = $this->toMenuMap($menu);
  }

  private function toMenuMap(array $objects)
    {
        $mapped = [];
        foreach ($objects as $object) {
            $exploded = explode('\\', get_class($object));
            $classname = end($exploded);
            $mapped[$classname] = $object;
        }
        return $mapped;
    }

  // public function order(array $categories): Invoice {}

  public function getCategories() {
    return array_keys($this->menuMap);
  }
}