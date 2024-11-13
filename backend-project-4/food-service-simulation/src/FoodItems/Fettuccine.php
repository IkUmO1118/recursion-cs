<?php

namespace FoodItems;
use \FoodItems\FoodItem;

class Fettuccine extends FoodItem {
  const CATEGORY = 'Fettuccine';

  public function __construct() {
    $name = "Fettuccine";
    $description = "a flat, thick pasta served with a creamy sauce, typically Alfredo, for a rich and comforting meal.";
    $price = 10.0;
    parent::__construct($name, $description, $price);
  }

  public function getCategory(): string {
    return self::CATEGORY;
  }
}