<?php

use Users\Employees\Employee;

class RestaurantLocation implements FileConvertible
{
  private string $name;
  private string $address;
  private string $city;
  private string $state;
  private string $zipCode;
  /**@var Employee[] */
  private array $employees;
  private bool $isOpen;

  public function __construct(string $name, string $address, string $city, string $state, string $zipCode, array $employees, bool $isOpen)
  {
    $this->name = $name;
    $this->address = $address;
    $this->city = $city;
    $this->state = $state;
    $this->zipCode = $name;
    $this->employees = $employees;
    $this->isOpen = $isOpen;
  }

  public function toString(): string
  {
    return sprintf(
      "Name: %s\nAddress: %s, %s, %s, %s\nIs Open: %s\nEmployees: %d",
      $this->name,
      $this->address,
      $this->city,
      $this->state,
      $this->zipCode,
      $this->isOpen ? 'Yes' : 'No',
      count($this->employees)
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "<div class='restaurant-location'>
              <h2>%s</h2>
              <p>Address: %s, %s, %s, %s</p>
              <p>Status: %s</p>
              <p>Number of Employees: %d</p>
          </div>",
      htmlspecialchars($this->name),
      htmlspecialchars($this->address),
      htmlspecialchars($this->city),
      htmlspecialchars($this->state),
      htmlspecialchars($this->zipCode),
      $this->isOpen ? 'Open' : 'Closed',
      count($this->employees)
    );
  }

  public function toMarkdown(): string
  {
    return "## Restaurant Location: {$this->name}
- Address: {$this->address}, {$this->city}, {$this->state}, {$this->zipCode}
- Status: " . ($this->isOpen ? 'Open' : 'Closed') . "
- Number of Employees: " . count($this->employees);
  }

  public function toArray(): array
  {
    return [
      'name' => $this->name,
      'address' => $this->address,
      'city' => $this->city,
      'state' => $this->state,
      'zipCode' => $this->zipCode,
      'isOpen' => $this->isOpen,
      'employees' => array_map(fn(Employee $employee) => $employee->toArray(), $this->employees),
    ];
  }

  // Getters
  public function getName(): string
  {
    return $this->name;
  }

  public function getAddress(): string
  {
    return $this->address;
  }

  public function getCity(): string
  {
    return $this->city;
  }

  public function getState(): string
  {
    return $this->state;
  }

  public function getZipCode(): string
  {
    return $this->zipCode;
  }

  /**
   * @return Employee[]
   */
  public function getEmployees(): array
  {
    return $this->employees;
  }

  public function getIsOpen(): bool
  {
    return $this->isOpen;
  }

  // Setters
  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function setAddress(string $address): void
  {
    $this->address = $address;
  }

  public function setCity(string $city): void
  {
    $this->city = $city;
  }

  public function setState(string $state): void
  {
    $this->state = $state;
  }

  public function setZipCode(string $zipCode): void
  {
    $this->zipCode = $zipCode;
  }

  /**
   * @param Employee[] $employees
   */
  public function setEmployees(array $employees): void
  {
    $this->employees = $employees;
  }

  public function setIsOpen(bool $isOpen): void
  {
    $this->isOpen = $isOpen;
  }
}
