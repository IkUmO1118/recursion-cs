<?php

namespace FoodItems;
use \FoodItems\FoodItem;

class Spaghetti extends FoodItem {
  const CATEGORY = 'Spaghetti';

  public function __construct() {
    $name = "Spaghetti";
    $description = "a classic Italian pasta dish made with long, thin noodles, often served with a rich tomato sauce.";
    $price = 23.0;
    $preparationMinTime = 5;
    parent::__construct($name, $description, $price, $preparationMinTime);
  }

  public function getCategory(): string {
    return self::CATEGORY;
  }
}