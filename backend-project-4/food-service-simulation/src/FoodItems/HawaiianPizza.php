<?php

namespace FoodItems;
use \FoodItems\FoodItem;

class HawaiianPizza extends FoodItem {
  const CATEGORY = 'HawaiianPizza';

  public function __construct() {
    $name = "HawaiianPizza";
    $description = "a pizza topped with ham and pineapple, blending savory and sweet flavors in each bite.";
    $price = 18.0;
    $preparationMinTime = 2;
    parent::__construct($name, $description, $price, $preparationMinTime);
  }

  public function getCategory(): string {
    return self::CATEGORY;
  }
}