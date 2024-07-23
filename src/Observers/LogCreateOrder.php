<?php

namespace Src\Observers;

use Src\Observers\ActionCreateOrder;
use Src\Order;

class LogCreateOrder implements ActionCreateOrder 
{
    public function executeAction(Order $order): void
    {
        echo 'saving log' . PHP_EOL;
    }
}