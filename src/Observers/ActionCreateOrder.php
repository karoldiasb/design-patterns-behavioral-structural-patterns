<?php

namespace Src\Observers;

use Src\Order;

interface ActionCreateOrder
{
    public function executeAction(Order $order): void;
}