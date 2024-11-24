<?php

namespace Users\Employees;

use Users\User;
use DateTime;
use FileConverter\FileConvertible;

class Employee extends User implements FileConvertible
{
  private string $jobTitle;
  private float $salary;
  private  DateTime $startDate;
  /** @var string[] */
  private array $awards;

  public function __construct(
    int $id,
    string $firstName,
    string $lastName,
    string $email,
    string $password,
    string $phoneNumber,
    string $address,
    DateTime $birthDate,
    DateTime $membershipExpirationDate,
    string $role,
    string $jobTitle,
    float $salary,
    DateTime $startDate,
    array $awards,
  ) {
    $this->jobTitle = $jobTitle;
    $this->salary = $salary;
    $this->startDate = $startDate;
    $this->awards = $awards;

    parent::__construct(
      $id,
      $firstName,
      $lastName,
      $email,
      $password,
      $phoneNumber,
      $address,
      $birthDate,
      $membershipExpirationDate,
      $role,
    );
  }

  public function toString(): string
  {
    return sprintf(
      "ID: %d, Job Title: %s, %s %s, Start Date: %s",
      $this->getId(),
      $this->jobTitle,
      $this->getFirstName(),
      $this->getLastName(),
      $this->startDate->format('Y-m-d'),
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "<div class='employee-card'>
                <h2>%s %s</h2>
                <p>Email: %s</p>
                <p>Job Title: %s</p>
                <p>Salary: $%.2f</p>
                <p>Start Date: %s</p>
                <p>Awards: %s</p>
            </div>",
      htmlspecialchars($this->getFirstName()),
      htmlspecialchars($this->getLastName()),
      htmlspecialchars($this->getEmail()),
      htmlspecialchars($this->jobTitle),
      $this->salary,
      $this->startDate->format('Y-m-d'),
      htmlspecialchars(implode(', ', $this->awards))
    );
  }

  public function toMarkdown(): string
  {
    return "## Employee: {$this->getFirstName()} {$this->getLastName()}
- Email: {$this->getEmail()}
- Job Title: {$this->jobTitle}
- Salary: \${$this->salary}
- Start Date: {$this->startDate->format('Y-m-d')}
- Awards: " . (empty($this->awards) ? 'None' : implode(', ', $this->awards));
  }

  public function toArray(): array
  {
    return [
      'id' => $this->getId(),
      'firstName' => $this->getFirstName(),
      'lastName' => $this->getLastName(),
      'email' => $this->getEmail(),
      'jobTitle' => $this->jobTitle,
      'salary' => $this->salary,
      'startDate' => $this->startDate->format('Y-m-d'),
      'awards' => $this->awards,
    ];
  }

  // getter
  public function getJobTitle(): string
  {
    return $this->jobTitle;
  }
  public function getSalary(): float
  {
    return $this->salary;
  }
  public function getStartDate(): DateTime
  {
    return $this->startDate;
  }
  /** @return string[] */
  public function getAwards(): array
  {
    return $this->awards;
  }

  // setter
  public function setJobTitle(string $jobTitle)
  {
    $this->jobTitle = $jobTitle;
  }
  public function setSalary(string $salary)
  {
    $this->$salary = $salary;
  }
  public function setStartDate(string $startDate)
  {
    $this->$startDate = $startDate;
  }
  public function setAwards(string $awards)
  {
    $this->$awards = $awards;
  }
}
