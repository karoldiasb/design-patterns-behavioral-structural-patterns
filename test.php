<?php

use Src\Budget;
use Src\Tax\Icms;
use Src\Tax\Iss;
use Src\TaxCalculator;

require 'vendor/autoload.php';

$calculator = new TaxCalculator();

$budget = new Budget();
$budget->value = 100;

echo 'icms value: ' . $calculator->calculate($budget, new Icms());
echo ' | iss value: ' . $calculator->calculate($budget, new Iss());