<?php

namespace Companies\Restaurants;

use Companies\Company;
use FileConverter\FileConvertible;

class RestaurantChain extends Company implements FileConvertible
{
  private int $chainId;
  /** @var RestaurantLocation[] */
  private array $restaurantLocations = [];
  private string $cuisineType;
  private int $numberOfLocations;
  private string $parentCompany;

  public function __construct(
    $name,
    $foundingYear,
    $description,
    $website,
    $phone,
    $industory,
    $ceo,
    $isPubliclyTraded,
    $country,
    $founder,
    $totalEmployees,
    $chainId,
    $restaurantLocations,
    $cuisineType,
    $numberOfLocations,
    $parentCompany,
  ) {
    parent::__construct($name, $foundingYear, $description, $website, $phone, $industory, $ceo, $isPubliclyTraded, $country, $founder, $totalEmployees,);
    $this->chainId = $chainId;
    $this->restaurantLocations = $restaurantLocations;
    $this->cuisineType = $cuisineType;
    $this->numberOfLocations = $numberOfLocations;
    $this->parentCompany = $parentCompany;
  }

  public function toString(): string
  {
    return sprintf(
      "Chain ID: %d\nCuisine Type: %s\nNumber of Locations: %d\nParent Company: %s\n",
      $this->chainId,
      $this->cuisineType,
      $this->numberOfLocations,
      $this->parentCompany
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "<div class='restaurant-chain'>
              <h2>%s</h2>
              <p>Chain ID: %d</p>
              <p>Cuisine Type: %s</p>
              <p>Number of Locations: %d</p>
              <p>Parent Company: %s</p>
          </div>",
      htmlspecialchars($this->getName()),
      $this->chainId,
      htmlspecialchars($this->cuisineType),
      $this->numberOfLocations,
      htmlspecialchars($this->parentCompany)
    );
  }

  public function toMarkdown(): string
  {
    return "## Restaurant Chain: {$this->getName()}
- Chain ID: {$this->chainId}
- Cuisine Type: {$this->cuisineType}
- Number of Locations: {$this->numberOfLocations}
- Parent Company: {$this->parentCompany}";
  }

  public function toArray(): array
  {
    return [
      'chainId' => $this->chainId,
      'restaurantLocations' => array_map(
        fn($location) => $location->toArray(),
        $this->restaurantLocations
      ),
      'cuisineType' => $this->cuisineType,
      'numberOfLocations' => $this->numberOfLocations,
      'parentCompany' => $this->parentCompany,
    ];
  }

  // Getters
  public function getChainId(): int
  {
    return $this->chainId;
  }

  /**
   * @return RestaurantLocation[]
   */
  public function getRestaurantLocations(): array
  {
    return $this->restaurantLocations;
  }

  public function getCuisineType(): string
  {
    return $this->cuisineType;
  }

  public function getNumberOfLocations(): int
  {
    return $this->numberOfLocations;
  }

  public function getParentCompany(): string
  {
    return $this->parentCompany;
  }

  // Setters
  public function setChainId(int $chainId): void
  {
    $this->chainId = $chainId;
  }

  /**
   * @param RestaurantLocation[] $restaurantLocations
   */
  public function setRestaurantLocations(array $restaurantLocations): void
  {
    $this->restaurantLocations = $restaurantLocations;
  }

  public function setCuisineType(string $cuisineType): void
  {
    $this->cuisineType = $cuisineType;
  }

  public function setNumberOfLocations(int $numberOfLocations): void
  {
    $this->numberOfLocations = $numberOfLocations;
  }

  public function setParentCompany(string $parentCompany): void
  {
    $this->parentCompany = $parentCompany;
  }
}
