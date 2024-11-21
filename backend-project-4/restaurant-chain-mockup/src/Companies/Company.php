<?php
class Company implements FileConvertible
{
  private string $name;
  private int $foundingYear;
  private string $description;
  private string $website;
  private string $phone;
  private string $industry;
  private string $ceo;
  private bool $isPubliclyTraded;
  private string $country;
  private string $founder;
  private int $totalEmployees;

  public function __construct(
    string $name,
    int $foundingYear,
    string $description,
    string $website,
    string $phone,
    string $industry,
    string $ceo,
    bool $isPubliclyTraded,
    string $country,
    string $founder,
    int $totalEmployees
  ) {
    $this->name = $name;
    $this->foundingYear = $foundingYear;
    $this->description = $description;
    $this->website = $website;
    $this->phone = $phone;
    $this->industry = $industry;
    $this->ceo = $ceo;
    $this->isPubliclyTraded = $isPubliclyTraded;
    $this->country = $country;
    $this->founder = $founder;
    $this->totalEmployees = $totalEmployees;
  }

  public function toString(): string
  {
    return sprintf(
      "Company: %s\nFounded: %d\nDescription: %s\nWebsite: %s\nPhone: %s\nIndustry: %s\nCEO: %s\nPublicly Traded: %s\nCountry: %s\nFounder: %s\nTotal Employees: %d\n",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website,
      $this->phone,
      $this->industry,
      $this->ceo,
      $this->isPubliclyTraded ? 'Yes' : 'No',
      $this->country,
      $this->founder,
      $this->totalEmployees
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "<div class='company-card'>
              <h2>%s</h2>
              <p><strong>Founded:</strong> %d</p>
              <p><strong>Description:</strong> %s</p>
              <p><strong>Website:</strong> <a href='%s'>%s</a></p>
              <p><strong>Phone:</strong> %s</p>
              <p><strong>Industry:</strong> %s</p>
              <p><strong>CEO:</strong> %s</p>
              <p><strong>Publicly Traded:</strong> %s</p>
              <p><strong>Country:</strong> %s</p>
              <p><strong>Founder:</strong> %s</p>
              <p><strong>Total Employees:</strong> %d</p>
          </div>",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website,
      $this->website,
      $this->phone,
      $this->industry,
      $this->ceo,
      $this->isPubliclyTraded ? 'Yes' : 'No',
      $this->country,
      $this->founder,
      $this->totalEmployees
    );
  }

  public function toMarkdown(): string
  {
    return "## Company: {$this->name}
- Founded: {$this->foundingYear}
- Description: {$this->description}
- Website: [{$this->website}]({$this->website})
- Phone: {$this->phone}
- Industry: {$this->industry}
- CEO: {$this->ceo}
- Publicly Traded: " . ($this->isPubliclyTraded ? 'Yes' : 'No') . "
- Country: {$this->country}
- Founder: {$this->founder}
- Total Employees: {$this->totalEmployees}";
  }

  public function toArray(): array
  {
    return [
      'name' => $this->name,
      'foundingYear' => $this->foundingYear,
      'description' => $this->description,
      'website' => $this->website,
      'phone' => $this->phone,
      'industry' => $this->industry,
      'ceo' => $this->ceo,
      'isPubliclyTraded' => $this->isPubliclyTraded,
      'country' => $this->country,
      'founder' => $this->founder,
      'totalEmployees' => $this->totalEmployees
    ];
  }

  // Getters
  public function getName(): string
  {
    return $this->name;
  }

  public function getFoundingYear(): int
  {
    return $this->foundingYear;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function getWebsite(): string
  {
    return $this->website;
  }

  public function getPhone(): string
  {
    return $this->phone;
  }

  public function getIndustry(): string
  {
    return $this->industry;
  }

  public function getCeo(): string
  {
    return $this->ceo;
  }

  public function getIsPubliclyTraded(): bool
  {
    return $this->isPubliclyTraded;
  }

  public function getCountry(): string
  {
    return $this->country;
  }

  public function getFounder(): string
  {
    return $this->founder;
  }

  public function getTotalEmployees(): int
  {
    return $this->totalEmployees;
  }

  // Setters
  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function setFoundingYear(int $foundingYear): void
  {
    $this->foundingYear = $foundingYear;
  }

  public function setDescription(string $description): void
  {
    $this->description = $description;
  }

  public function setWebsite(string $website): void
  {
    $this->website = $website;
  }

  public function setPhone(string $phone): void
  {
    $this->phone = $phone;
  }

  public function setIndustry(string $industry): void
  {
    $this->industry = $industry;
  }

  public function setCeo(string $ceo): void
  {
    $this->ceo = $ceo;
  }

  public function setIsPubliclyTraded(bool $isPubliclyTraded): void
  {
    $this->isPubliclyTraded = $isPubliclyTraded;
  }

  public function setCountry(string $country): void
  {
    $this->country = $country;
  }

  public function setFounder(string $founder): void
  {
    $this->founder = $founder;
  }

  public function setTotalEmployees(int $totalEmployees): void
  {
    $this->totalEmployees = $totalEmployees;
  }
}
