<?php

namespace Persons\Customers;
use \Persons\Person;
use \Invoices\Invoice;
use \Restaurants\Restaurant;

class Customer extends Person {
  public array $order;

  public function __construct(string $name, int $age, string $address, array $order) {
    parent::__construct($name, $age, $address);
    $this->order = $order;
  }

  // public function interestedCategories(Restaurant $restaurant): string[] {}

  public function order(Restaurant $restaurant): Invoice {
    $invoice = new Invoice(29.99, new \DateTime('2024-11-02 14:30:00'), 30);

    return $invoice;
  }
}