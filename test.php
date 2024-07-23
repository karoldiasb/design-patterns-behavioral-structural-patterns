<?php

use Src\Budget;
use Src\BudgetList;
use Src\BudgetStates\Approved;
use Src\BudgetStates\Disapproved;
use Src\BudgetStates\Finished;
use Src\Commands\CreateOrderHandler;
use Src\DiscountCalculator;
use Src\Input\OrderInput;
use Src\Observers\{LogCreateOrder, SendEmailCreateOrder};
use Src\Tax\{Icms, Ipva, Irpf, Iss};
use Src\TaxCalculator;

require 'vendor/autoload.php';

$budget = new Budget();
$calculator = new TaxCalculator();

/* strategy */
$budget->value = 2000;
echo 'icms: ' . $calculator->calculate($budget, new Icms()) . PHP_EOL; 
$budget->value = 3000;
echo 'iss: ' . $calculator->calculate($budget, new Iss()) . PHP_EOL;

/* template method */
$budget->value = 6.200;
echo 'irpf: ' . $calculator->calculate($budget, new Irpf()) . PHP_EOL;
$budget->value = 41.200;
$budget->isPassengerCar = true;
echo 'ipva: ' . $calculator->calculate($budget, new Ipva()) . PHP_EOL;

/* chain of responsability */
$discountCalculator = new DiscountCalculator();
$budget->value = 600;
$budget->itensQuantity = 5;
echo 'discount calculated: ' . $discountCalculator->calculate($budget) . PHP_EOL;

/* command */
$orderInput = new OrderInput();
$orderInput->setClientId(1);
$orderInput->setBudgetQtItems(10);
$orderInput->setBudgetValue(6000);
$createOrderHandler = new CreateOrderHandler($orderInput);

/* observer */
$createOrderHandler->addActionAfterCreateOrder(new LogCreateOrder());
$createOrderHandler->addActionAfterCreateOrder(new SendEmailCreateOrder());

$createOrderHandler->execute();

/* iterator */

$budget1 = new Budget();
$budget1->value = 2000;
$budget1->itensQuantity = 2;
$budget1->state = new Approved();

$budget2 = new Budget();
$budget2->value = 3000;
$budget2->itensQuantity = 3;
$budget2->state = new Disapproved();

$budget3 = new Budget();
$budget3->value = 4000;
$budget3->itensQuantity = 4;
$budget3->state = new Finished();

$budgetList = new BudgetList();
$budgetList->add($budget1);
$budgetList->add($budget2);
$budgetList->add($budget3);

foreach ($budgetList as $budget) {
    echo 'value: ' . $budget->value . PHP_EOL;
    echo 'state: ' . get_class($budget->state) . PHP_EOL;
    echo 'qt. items: ' . $budget->itensQuantity . PHP_EOL;

    PHP_EOL;
}