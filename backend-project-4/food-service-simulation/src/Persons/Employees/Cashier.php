<?php

namespace Persons\Employees;

use FoodItems\FoodItem;
use FoodOrders\FoodOrder;
use Invoices\Invoice;
use \Persons\Employees\Employee;

class Cashier extends Employee {
  public function __construct(string $name, int $age, string $address, int $employeeId, float $salary) {
    parent::__construct( $name, $age, $address, $employeeId, $salary);
  }

  public function generateOrder(array $categories, array $menus): FoodOrder {
    echo "{$this->name} received the order.".PHP_EOL;
    $foodItems = [];
    foreach($categories as $category => $count) {
      while($count > 0) {
        $foodItems[] = new $menus[$category];
        $count--;
      }
    }

    return new FoodOrder($foodItems, time());
  }

  public function generateInvoice(FoodOrder $order): Invoice {
    $items = $order->getItems();
    $itemCount = count($items);

    $totalPrice = $this->getTotalPrice($items, $itemCount);

    echo "{$this->name} made the invoice." . PHP_EOL;
    return new Invoice($totalPrice, $order->getFormattedTime(), 7);
  }

  public function getTotalPrice(array $items, int $count): float {
    $totalPrice = 0;
    for($i=0; $i<$count; $i++) {
      $item = $items[$i];
      $totalPrice += $item->getPrice();
    }

    return $totalPrice;
  }

}