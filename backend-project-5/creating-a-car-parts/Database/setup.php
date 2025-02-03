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
