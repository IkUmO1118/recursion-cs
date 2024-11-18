<?php

namespace FoodOrders;

class FoodOrder {
  public array $items;
  public int $orderTime;
  public function __construct(array $items, int $orderTime)
  {
    $this->items = $items;
    $this->orderTime = $orderTime;
  }

  public function getItems(): array {
    return $this->items;
}
}