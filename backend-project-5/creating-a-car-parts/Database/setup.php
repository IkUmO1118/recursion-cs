<?php

use Database\MySQLWrapper;

$mysqli = new MySQLWrapper();

// create cars table
$result = $mysqli->query("
CREATE TABLE IF NOT EXISTS cars (
    id INT PRIMARY KEY AUTO_INCREMENT,
    make VARCHAR(50),
    model VARCHAR(50),
    year INT,
    color VARCHAR(20),
    price FLOAT,
    mileage FLOAT,
    transmission VARCHAR(20),
    engine VARCHAR(20),
    status VARCHAR(10)
);
");
if ($result === false) {
  throw new Exception('Could not create cars table.');
}

// create parts table
$result = $mysqli->query("
CREATE TABLE IF NOT EXISTS parts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    description VARCHAR(255),
    price FLOAT,
    quantityInStock INT
);
");
if ($result === false) {
  throw new Exception('Could not create parts table.');
}

// create carPart table (junction table for many-to-many relationship)
$result = $mysqli->query("
CREATE TABLE IF NOT EXISTS carPart (
    carID INT NOT NULL,
    partID INT NOT NULL,
    quantity INT,
    PRIMARY KEY (carID, partID),
    FOREIGN KEY (carID) REFERENCES cars(id) ON DELETE CASCADE,
    FOREIGN KEY (partID) REFERENCES parts(id) ON DELETE CASCADE
);
");
if ($result === false) {
  throw new Exception('Could not create carPart table.');
}

print("Successfully ran all SQL setup queries." . PHP_EOL);

function insertCarQuery(
  string $make,
  string $model,
  int $year,
  string $color,
  float $price,
  float $mileage,
  string $transmission,
  string $engine,
  string $status
): string {
  return "
    INSERT INTO cars (make, model, year, color, price, mileage, transmission, engine, status)
    VALUES ('$make', '$model', $year, '$color', $price, $mileage, '$transmission', '$engine', '$status');
  ";
}
function insertPartQuery(
  string $name,
  string $description,
  float $price,
  int $quantityInStock
): string {
  return "
    INSERT INTO parts (name, description, price, quantityInStock)
    VALUES ('$name', '$description', $price, $quantityInStock);
  ";
}
function insertCarPartQuery(
  int $carID,
  int $partID,
  int $quantity
): string {
  return "
    INSERT INTO carPart (carID, partID, quantity)
    VALUES ($carID, $partID, $quantity);
  ";
}

function runQuery(mysqli $mysqli, string $query): void
{
  $result = $mysqli->query($query);
  if ($result === false) {
    throw new Exception('Could not execute query.');
  } else {
    echo "Query executed successfully.\n";
  }
}
runQuery($mysqli, insertCarQuery(
  make: 'Toyota',
  model: 'Corolla',
  year: 2020,
  color: 'Blue',
  price: 20000,
  mileage: 1500,
  transmission: 'Automatic',
  engine: 'Gasoline',
  status: 'Available'
));
runQuery($mysqli, insertPartQuery(
  name: 'Brake Pad',
  description: 'High Quality Brake Pad',
  price: 45.99,
  quantityInStock: 100
));

runQuery($mysqli, insertCarPartQuery(
  carID: 1, // 適切なcarIDを設定
  partID: 1, // 適切なpartIDを設定
  quantity: 4
));

echo "Data insertion successful." . PHP_EOL;
$mysqli->close();
