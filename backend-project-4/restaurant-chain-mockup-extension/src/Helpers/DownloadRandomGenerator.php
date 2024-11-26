<?php

namespace Helpers;

use Users\User;
use Users\Employees\Employee;
use Companies\Company;
use Companies\Restaurants\RestaurantLocation;
use Companies\Restaurants\RestaurantChain;
use Faker\Factory;

class DownloadRandomGenerator
{
  // ---------- restaurant chain -----------------

  /**
   * download用のインスタンスを生成する
   *
   * @param integer $numberOfEmployees
   * @param integer $numberOfLocations
   * @param integer $minSalary
   * @param integer $maxSalary
   * @return RestaurantChain
   */
  public static function downloadRestaurantChain(int $numberOfEmployees, int $numberOfLocations, int $minSalary, int $maxSalary): RestaurantChain
  {
    $faker = Factory::create();
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

    // company部分の作成
    $company = self::downloadCompany($numberOfEmployees);

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
      rand(1, 65536),
      self::downloadRestaurantLocations($numberOfLocations, $numberOfEmployees, $minSalary, $maxSalary),
      $faker->randomElement($DISHES),
      rand(1, 10),
      $faker->company
    );
  }

  /**
   * ダウンロード用のレストランチェーンのインスタンスを生成する
   *
   * @param integer $numberOfChains
   * @param integer $numberOfEmployees
   * @param integer $numberOfLocations
   * @param integer $minSalary
   * @param integer $maxSalary
   * @return array
   */
  public static function downloadRestaurantChains(int $numberOfChains, int $numberOfEmployees, int $numberOfLocations, int $minSalary, int $maxSalary): array
  {
    $faker = Factory::create();
    $chains = [];

    for ($i = 0; $i < $numberOfChains; $i++) {
      $chains[] = self::downloadRestaurantChain($numberOfEmployees, $numberOfLocations, $minSalary, $maxSalary);
    }

    return $chains;
  }



  // ---------- restaurant location -----------------
  /**
   * ダウンロード用のレストランチェーンのロケーションのインスタンスを生成する
   *
   * @param integer $numberOfEmployees
   * @param integer $minSalary
   * @param integer $maxSalary
   * @return RestaurantLocation
   */
  public static function downloadRestaurantLocation(int $numberOfEmployees, int  $minSalary, int $maxSalary): RestaurantLocation
  {
    $faker = Factory::create();

    return new RestaurantLocation(
      $faker->company,
      sprintf("%s %s", $faker->streetName, $faker->secondaryAddress),
      $faker->city,
      $faker->state,
      $faker->postcode,
      self::downloadEmployees($numberOfEmployees, $minSalary, $maxSalary),
      $faker->boolean,
      $faker->boolean
    );
  }

  /**
   * ダウン用レストランロケーションのインスタンスの配列を生成
   *
   * @param [type] $numberOfLocations
   * @param [type] $numberOfEmployees
   * @param [type] $minSalary
   * @param [type] $maxSalary
   * @return array
   */
  public static function downloadRestaurantLocations($numberOfLocations, $numberOfEmployees, $minSalary, $maxSalary): array
  {
    $faker = Factory::create();
    $locations = [];

    for ($i = 0; $i < $numberOfLocations; $i++) {
      $locations[] = self::downloadRestaurantLocation($numberOfEmployees, $minSalary, $maxSalary);
    }

    return $locations;
  }

  // ---------- company -----------------
  /**
   * ダウンロード用カンパニーのインスタンスを生成
   *
   * @param integer $numberOfEmployees
   * @return Company
   */
  public static function downloadCompany(int $numberOfEmployees): Company
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
      $numberOfEmployees
    );
  }

  /**
   * ダウンロード用のカンパニーの配列を作成
   *
   * @param integer $min
   * @param integer $max
   * @param integer $numberOfEmployees
   * @return array
   */
  public static function downloadCompanies(int $min, int $max, int $numberOfEmployees): array
  {
    $faker = Factory::create();
    $companies = [];
    $numOfCompanies = $faker->numberBetween($min, $max);

    for ($i = 0; $i < $numOfCompanies; $i++) {
      $companies[] = self::downloadCompany($numberOfEmployees);
    }

    return $companies;
  }

  // ---------- employee -----------------

  /**
   * ランダムなEmployeeを生成する
   *
   * @return Employee
   */
  public static function downloadEmployee($minSalary, $maxSalary): Employee
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

    // user
    // $user = self::user();

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

      // jobtitle
      // $faker->jobTitle,
      $faker->randomElement($JOBTITLE),
      // salary
      $faker->randomFloat(2, $minSalary, $maxSalary),
      // startDate
      $faker->dateTimeBetween('-30 years', 'now'),
      // awards
      self::awards()
    );
  }


  /**
   * employeeのawards生成用メソッド
   * 文字列の配列を返す
   * 受賞歴なしなら"No awarads received"の文字列が入っただけの配列を返す
   *
   * @return array
   */
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

  /**
   * ランダムなEmployeeの配列を生成する
   *
   * @param integer $min
   * @param integer $max
   * @return array
   */
  public static function downloadEmployees($numberOfEmployees, $minSalary, $maxSalary): array
  {
    $faker = Factory::create();
    $employees = [];

    for ($i = 0; $i < $numberOfEmployees; $i++) {
      $employees[] = self::downloadEmployee($minSalary, $maxSalary);
    }

    return $employees;
  }


  // ---------- user ---------------------
  /**
   * ランダムなユーザを生成する
   *
   * @return User
   */
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

  /**
   * ランダムなユーザーの配列を生成する
   *
   * @param integer $min
   * @param integer $max
   * @return array
   */
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
}
