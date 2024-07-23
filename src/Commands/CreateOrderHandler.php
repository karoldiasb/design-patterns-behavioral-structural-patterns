<?php

namespace Src\Commands;

use Src\Budget;
use Src\Input\OrderInput;
use Src\Observers\ActionCreateOrder;
use Src\Order;

class CreateOrderHandler implements CommandInterface
{
    /**
     * @var ActionCreateOrder[]
     */
    private array $actions = [];
    public Order $order;

    private OrderInput $orderInput;
    public function __construct(OrderInput $orderInput)
    {
        $this->orderInput = $orderInput;
    }

    public function addActionAfterCreateOrder(ActionCreateOrder $action)
    {
        $this->actions[] = $action;
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

        echo 'order created' . PHP_EOL;

        $this->notify($order);
    }

    private function notify(Order $order)
    {
        foreach($this->actions as $action){
            $action->executeAction($order);
        }
    }
}