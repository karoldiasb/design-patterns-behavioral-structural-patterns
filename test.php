<?php

use Src\Budget;
use Src\DiscountCalculator;
use Src\Tax\Icms;
use Src\Tax\Ipva;
use Src\Tax\Irpf;
use Src\Tax\Iss;
use Src\TaxCalculator;

require 'vendor/autoload.php';

$calculator = new TaxCalculator();

$budget = new Budget();
$budget->value = 100;

echo 'icms: ' . $calculator->calculate($budget, new Icms()) . PHP_EOL; 
echo 'iss: ' . $calculator->calculate($budget, new Iss()) . PHP_EOL;

$budget->value = 6.200;
echo 'irpf: ' . $calculator->calculate($budget, new Irpf()) . PHP_EOL;

$budget->value = 41.200;
$budget->isPassengerCar = true;
echo 'ipva: ' . $calculator->calculate($budget, new Ipva()) . PHP_EOL;

$discountCalculator = new DiscountCalculator();

$budget->value = 600;
$budget->itensQuantity = 5;

echo 'discount calculated: ' . $discountCalculator->calculate($budget);