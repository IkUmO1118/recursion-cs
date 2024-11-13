<?php

namespace FoodItems;
use \FoodItems\FoodItem;

class Spaghetti extends FoodItem {
  const CATEGORY = 'Spaghetti';

  public function __construct() {
    $name = "Spaghetti";
    $description = "a classic Italian pasta dish made with long, thin noodles, often served with a rich tomato sauce.";
    $price = 13.0;
    parent::__construct($name, $description, $price);
  }

  public function getCategory(): string {
    return self::CATEGORY;
  }
}