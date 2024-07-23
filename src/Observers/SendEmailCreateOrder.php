<?php

namespace Src\Observers;

use Src\Order;

class SendEmailCreateOrder implements ActionCreateOrder
{
    public function executeAction(Order $order): void
    {
        echo 'sending email' . PHP_EOL;
    }
}