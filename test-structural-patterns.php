<?php

use Src\Budget;
use Src\BudgetRegister;
use Src\Http\CurlHttpAdapter;
use Src\Report\Content\{BudgetContent, OrderContent};
use Src\Order;
use Src\Report\{XmlExport, ZipExport};
use Src\BudgetStates\Finished;

require 'vendor/autoload.php';

$budget = new Budget();
$budget->value = 200;
$budget->itensQuantity = 5;
$budget->state = new Finished();

// adapter
$budgetRegister = new BudgetRegister(new CurlHttpAdapter());
$budgetRegister->register($budget);

// bridge
$budget = new Budget();
$budget->value = 200;
$budget->itensQuantity = 5;

$budgetContent = new BudgetContent($budget);
$budgetToXml = new XmlExport();
echo 'xml budget: ' . $budgetToXml->save($budgetContent) . PHP_EOL;
$budgetToZip = new ZipExport();
echo 'zip budget: ' . $budgetToZip->save($budgetContent) . PHP_EOL;

$order = new Order();
$order->date = new DateTime();
$order->clientId = 1;
$order->budget = $budget;

$orderContent = new OrderContent($order);
$orderToXml = new XmlExport();
echo 'xml order: ' . $orderToXml->save($orderContent) . PHP_EOL;
$orderToZip = new ZipExport();
echo 'zip order: ' . $orderToZip->save($orderContent) . PHP_EOL;
