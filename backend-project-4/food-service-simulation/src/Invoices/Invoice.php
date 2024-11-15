<?php

namespace Invoices;
class Invoice {
  public float $finalPrice;
  public \DateTime $orderTime;
  public int $estimatedTimeInMinutes;

  public function __construct(float $finalPrice, \DateTime $orderTime, int $estimatedTimeInMinutes)
  {
    $this->finalPrice = $finalPrice;
    $this->orderTime = $orderTime;
    $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
  }

  public function printInvoice(): string {
    return "";
  }
}