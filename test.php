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

echo 'icms value: ' . $calculator->calculate($budget, new Icms());
echo ' | iss value: ' . $calculator->calculate($budget, new Iss());

$budget->value = 6.200;
echo ' | irpf value: ' . $calculator->calculate($budget, new Irpf());

$budget->value = 41.200;
$budget->isPassengerCar = true;
echo ' | ipva value: ' . $calculator->calculate($budget, new Ipva());

$discountCalculator = new DiscountCalculator();

$budget->value = 600;
$budget->itensQuantity = 5;

echo ' | discount calculator: ' . $discountCalculator->calculate($budget);