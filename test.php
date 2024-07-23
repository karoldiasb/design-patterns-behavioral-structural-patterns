<?php

use Src\Budget;
use Src\Commands\CreateOrderHandler;
use Src\DiscountCalculator;
use Src\Input\OrderInput;
use Src\Observers\{LogCreateOrder, SendEmailCreateOrder};
use Src\Tax\{Icms, Ipva, Irpf, Iss};
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

echo 'discount calculated: ' . $discountCalculator->calculate($budget) . PHP_EOL;

$orderInput = new OrderInput();
$orderInput->setClientId(1);
$orderInput->setBudgetQtItems(10);
$orderInput->setBudgetValue(6000);

$createOrderHandler = new CreateOrderHandler($orderInput);
$createOrderHandler->addActionAfterCreateOrder(new LogCreateOrder());
$createOrderHandler->addActionAfterCreateOrder(new SendEmailCreateOrder());
$createOrderHandler->execute();