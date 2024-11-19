<?php
namespace FoodItems;

abstract class FoodItem {
  protected string $name;
  protected string $description;
  protected float $price;
  protected int $preparationMinTime;

  public function __construct(string $name, string $description, float $price, int $preparationMinTime) {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->preparationMinTime = $preparationMinTime;
  }

  public function getPrice(): float {
    return $this->price;
  }

  public function getPreparationMinTime(): float {
    return $this->preparationMinTime;
  }

  abstract public function getCategory(): string;
}