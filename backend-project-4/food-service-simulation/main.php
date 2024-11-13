<?php

require_once 'src/FoodItems/FoodItem.php';
require_once 'src/FoodItems/CheeseBurger.php';
require_once 'src/FoodItems/Fettuccine.php';
require_once 'src/FoodItems/HawaiianPizza.php';
require_once 'src/FoodItems/Spaghetti.php';

$cheeseBurger = new FoodItems\CheeseBurger();
$fettuccine = new FoodItems\Fettuccine();
$hawaiianPizza = new FoodItems\HawaiianPizza();
$spaghetti = new FoodItems\Spaghetti();

echo $cheeseBurger->getCategory();