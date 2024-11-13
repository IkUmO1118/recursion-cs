<?php

namespace FoodItems;
use \FoodItems\FoodItem;

class HawaiianPizza extends FoodItem {
  const CATEGORY = 'HawaiianPizza';

  public function __construct() {
    $name = "HawaiianPizza";
    $description = "a pizza topped with ham and pineapple, blending savory and sweet flavors in each bite.";
    $price = 10.0;
    parent::__construct($name, $description, $price);
  }

  public function getCategory(): string {
    return self::CATEGORY;
  }
}