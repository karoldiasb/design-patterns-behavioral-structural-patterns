<?php

namespace Src\Commands;

use Src\Budget;
use Src\Input\OrderInput;
use Src\Order;

class CreateOrderHandler implements CommandInterface
{
    private OrderInput $orderInput;
    public function __construct(OrderInput $orderInput)
    {
        $this->orderInput = $orderInput;
    }

    public function execute(): void
    {
        $budget = new Budget();
        $budget->itensQuantity = $this->orderInput->getBudgetQtItems();
        $budget->value = $this->orderInput->getBudgetValue();

        $order = new Order();
        $order->date = new \DateTime();
        $order->clientId = $this->orderInput->getClientId();
        $order->budget = $budget;

        echo 'order created';
    }
}