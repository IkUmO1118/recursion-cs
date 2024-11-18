<?php

namespace Invoices;
class Invoice {
  public float $finalPrice;
  public int $orderTime;
  public int $estimatedTimeInMinutes;

  public function __construct(float $finalPrice, int $orderTime, int $estimatedTimeInMinutes)
  {
    $this->finalPrice = $finalPrice;
    $this->orderTime = $orderTime;
    $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
  }

  public function printInvoice() {
    echo "------------------------------" . PHP_EOL;
    echo "Date: {$this->orderTime}" . PHP_EOL;
    echo "Final Price: $" . $this->finalPrice . PHP_EOL;
    echo "------------------------------" . PHP_EOL;
  }
}