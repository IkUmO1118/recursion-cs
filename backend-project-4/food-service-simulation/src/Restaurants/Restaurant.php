<?php

namespace Restaurants;

use FoodItems\FoodItem;
use Invoices\Invoice;
use Persons\Employees\Cashier;
use Persons\Employees\Chef;
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
        // [...FoodItem]
        // Array (
        //  [CheeseBurger] => FoodItems\CheeseBurger Object
        //    (
        //       [name:protected] => CheeseBurger
        //       [description:protected] => a burger with a slice of melted cheese on top of the meat patty.
        //       [price:protected] => 10
        //    )
        //  ...
        // )

        return $mapped;
    }

  private function callCasher(): Cashier {
    $cashiers = array_filter($this->employees, function ($employee) {
      return $employee instanceof Cashier;
    });

    $cashier = reset($cashiers);
    return $cashier;
  }

  private function callChef(): Chef {
    $chefs = array_filter($this->employees, function ($employee) {
      return $employee instanceof Chef;
    });

    $chef = reset($chefs);
    return $chef;
  }

  public function order(array $categories): Invoice {
    // Array (
    //   [CheeseBurger] => 2
    //   [Spaghetti] => 1
    // )
    $order = $this->callCasher()->generateOrder($categories, $this->menuMap);
    $this->callChef()->prerareFood($order);
    return new Invoice(29.99, 20241118, 60);
  }

  public function getCategories() {
    return array_keys($this->menuMap);
  }
}