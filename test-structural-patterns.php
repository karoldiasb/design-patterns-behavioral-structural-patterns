<?php

use Src\Budget;
use Src\BudgetRegister;
use Src\Http\CurlHttpAdapter;

require 'vendor/autoload.php';

// adapter
$budgetRegister = new BudgetRegister(new CurlHttpAdapter());
$budgetRegister->register(new Budget());