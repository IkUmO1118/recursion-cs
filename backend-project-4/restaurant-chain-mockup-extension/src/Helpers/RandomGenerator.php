<?php

namespace Helpers;

use Companies\Company;
use Companies\Restaurants\RestaurantChain;
use Companies\Restaurants\RestaurantLocation;
use Users\User;
use Faker\Factory;
use Users\Employees\Employee;

class RandomGenerator
{
  // ----------------user--------------
  public static function user(): User
  {
    $faker = Factory::create();
    return new User(
      $faker->randomNumber(),
      $faker->firstName(),
      $faker->lastName(),
      $faker->email,
      $faker->password,
      $faker->phoneNumber,
      $faker->address,
      $faker->dateTimeThisCentury,
      $faker->dateTimeBetween('-10 years', '+20 years'),
      $faker->randomElement(['admin', 'user', 'editor'])
    );
  }
  public static function users(int $min, int $max): array
  {
    $faker = Factory::create();
    $users = [];
    $numOfUsers = $faker->numberBetween($min, $max);
    for ($i = 0; $i < $numOfUsers; $i++) {
      $users[] = self::user();
    }
    return $users;
  }

  // ---------------restaurant　chains
  public static function restaurantChains(int $min, int $max)
  {
    $faker = Factory::create();
    $chains = [];
    $numOfchains = $faker->numberBetween($min, $max);
    for ($i = 0; $i < $numOfchains; $i++) {
      $chains[] = self::restaurantChain();
    }
    return $chains;
  }

  public static function restaurantChain(): RestaurantChain
  {
    $faker = Factory::create();
    $company = self::company();

    $DISHES = [
      "Sushi",
      "Pizza",
      "Hamburger",
      "Pasta",
      "Fried Chicken",
      "Ramen",
      "Taco",
      "Steak",
      "Dim Sum",
      "Falafel",
      "Paella",
      "Curry",
      "Pho",
      "Biryani",
      "Fish and Chips",
      "Tofu Stir Fry",
      "Gyros",
      "Peking Duck",
      "Tamales",
      "Tom Yum Soup"
    ];

    return new RestaurantChain(
      $company->getName(),
      $company->getFoundingYear(),
      $company->getDescription(),
      $company->getWebsite(),
      $company->getPhone(),
      $company->getIndustory(),
      $company->getCeo(),
      $company->getIsPubliclyTraded(),
      $company->getCountry(),
      $company->getFounder(),
      $company->getTotalEmployees(),
      rand(1, 999999),
      self::restaurantLocations($company->getTotalEmployees(), $company->getTotalEmployees()),
      $faker->randomElement($DISHES),
      rand(1, 10),
      $faker->company
    );
  }

  // ----------restaurant locations
  public static function restaurantLocations(int $min, int $max)
  {
    $faker = Factory::create();
    $locations = [];
    $numOflocations = $faker->numberBetween($min, $max);
    for ($i = 0; $i < $numOflocations; $i++) {
      $locations[] = self::restaurantLocation();
    }
    return $locations;
  }

  public static function restaurantLocation()
  {
    $faker = Factory::create();

    return new RestaurantLocation(
      $faker->company,
      sprintf("%s %s", $faker->streetName, $faker->secondaryAddress),
      $faker->city,
      $faker->state,
      $faker->postcode,
      self::employees(1, 5),
      $faker->boolean,
      $faker->boolean
    );
  }

  // ------------company -----------------------
  public static function company(): Company
  {
    $faker = Factory::create();

    $INDUSTORY = [
      "Fast Food Restaurants",
      "Casual Dining Restaurants",
      "Fine Dining Restaurants",
      "Cafes & Coffee Shops",
      "Buffets and All-You-Can-Eat Restaurants",
      "Food Trucks & Mobile Vending",
      "Pizzerias",
      "Ethnic and Specialty Restaurants",
      "Seafood Restaurants",
      "Vegetarian and Vegan Restaurants",
      "Bakeries",
      "Delis and Sandwich Shops",
      "Ice Cream and Frozen Yogurt Shops",
      "Juice Bars and Smoothie Shops",
      "Pubs and Bars",
      "Catering Services",
      "Takeaway and Delivery Services"
    ];

    return new Company(
      $faker->name(),
      rand(1900, 2023),
      $faker->sentence($nbWords = 6, $variableNbWords = true),
      $faker->url,
      $faker->phoneNumber,
      $faker->randomElement($INDUSTORY),
      $faker->name(),
      $faker->boolean,
      $faker->country,
      $faker->name(),
      rand(1, 3)
    );
  }

  // -------------employees
  public static function employees(int $min, int $max): array
  {
    $faker = Factory::create();
    $employees = [];
    $numOfEmployees = $faker->numberBetween($min, $max);

    for ($i = 0; $i < $numOfEmployees; $i++) {
      $employees[] = self::employee();
    }

    return $employees;
  }

  public static function employee(): Employee
  {
    $faker = Factory::create();

    // random jobTitle
    $JOBTITLE = [
      "Restaurant Manager",
      "Executive Chef",
      "Sous Chef",
      "Line Cook",
      "Pastry Chef",
      "Dishwasher",
      "Server",
      "Host/Hostess",
      "Bartender",
      "Busser",
      "Barista",
      "Sommelier",
      "Fast Food Cashier",
      "Drive-Thru Operator",
      "Food Runner",
      "Head Waiter",
      "Kitchen Porter",
      "Prep Cook",
      "Maitre d'Hotel",
      "Baker"
    ];

    return new Employee(
      $faker->randomNumber(),
      $faker->firstName(),
      $faker->lastName(),
      $faker->email,
      $faker->password,
      $faker->phoneNumber,
      $faker->address,
      $faker->dateTimeThisCentury,
      $faker->dateTimeBetween('-10 years', '+20 years'),
      $faker->randomElement(['admin', 'user', 'editor']),
      $faker->randomElement($JOBTITLE),
      $faker->randomFloat(2, 10, 100),
      $faker->dateTimeBetween('-30 years', 'now'),
      self::awards()
    );
  }

  // ------------awards
  private static function awards(): array
  {
    // random awards
    $AWARDS = [
      "Best Innovative Company",
      "Employee's Choice Award",
      "Leader in Sustainability",
      "Top 100 Companies to Work For",
      "Best Customer Service",
      "Product of the Year",
      "Best Design Award",
      "Environmental Leadership",
      "Top Exporter of the Year",
      "Fastest Growing Company",
      "Technology Pioneer Award",
      "Community Involvement Award",
      "Best in Diversity & Inclusion",
      "Corporate Social Responsibility Award",
      "Excellence in Leadership"
    ];

    // faker
    $faker = Factory::create();

    // randomNumber
    $max = rand(1, 5);
    $min = 1;

    $awards = [];

    // もし0なら受賞歴なし
    if ($max == 0) {
      $awards[] = "No awards received";
      return $awards;
    }

    $numOfAwards = $faker->numberBetween($min, $max);
    for ($i = 0; $i < $numOfAwards; $i++) {
      $awards[] = $faker->randomElement($AWARDS);
    }

    return $awards;
  }
}
