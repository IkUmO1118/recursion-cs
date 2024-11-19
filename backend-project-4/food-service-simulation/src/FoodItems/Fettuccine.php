<?php

namespace FoodItems;
use \FoodItems\FoodItem;

class Fettuccine extends FoodItem {
  const CATEGORY = 'Fettuccine';

  public function __construct() {
    $name = "Fettuccine";
    $description = "a flat, thick pasta served with a creamy sauce, typically Alfredo, for a rich and comforting meal.";
    $price = 20.0;
    $preparationMinTime = 8;
    parent::__construct($name, $description, $price, $preparationMinTime);
  }

  public function getCategory(): string {
    return self::CATEGORY;
  }
}