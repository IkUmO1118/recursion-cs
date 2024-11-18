<?php

namespace Persons\Customers;
use \Persons\Person;
use \Invoices\Invoice;
use \Restaurants\Restaurant;

class Customer extends Person {
  private array $tastesMap = [];

  public function __construct(string $name, int $age, string $address, array $tastesMap) {
    parent::__construct($name, $age, $address);
    $this->tastesMap = $tastesMap;
  }

  private function interestedCategories(Restaurant $restaurant): array {
    $categories = $restaurant->getCategories();
    $categoriesMap = array_flip($categories);
    $interestedList = array_intersect_key($this->tastesMap, $categoriesMap);

    echo "{$this->name} wanted to eat ". implode(", ", array_keys($this->tastesMap)).".".PHP_EOL;

    return $interestedList;
  }

  private function toOrdersString(array $orderMap): array {
    $ordersStrings = [];
    foreach ($orderMap as $item => $quantity) {
      $ordersStrings[] = "{$item} x {$quantity}";
    }

    return $ordersStrings;
  }

  public function order(Restaurant $restaurant): Invoice {
    $interestedList = $this->interestedCategories($restaurant);
    // Array (
    //   [CheeseBurger] => 2
    //   [Spaghetti] => 1
    // )
    echo "{$this->name} was looking at the menu, and ordered " . implode(', ', $this->toOrdersString($interestedList)).".".PHP_EOL;
    $invoice = $restaurant->order($interestedList);

    return $invoice;
  }
}