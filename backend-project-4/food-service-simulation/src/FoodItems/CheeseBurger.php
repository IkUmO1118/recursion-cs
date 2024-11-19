<?php

namespace FoodItems;
use \FoodItems\FoodItem;

class CheeseBurger extends FoodItem {
  const CATEGORY = 'CheeseBurber';

  public function __construct() {
    $name = "CheeseBurger";
    $description = "a burger with a slice of melted cheese on top of the meat patty.";
    $price = 10.0;
    $preparationMinTime = 1;
    parent::__construct($name, $description, $price, $preparationMinTime);
  }

  public function getCategory(): string {
    return self::CATEGORY;
  }
}