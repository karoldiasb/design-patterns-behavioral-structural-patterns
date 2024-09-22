<?php

namespace Src\Report\Content;

use Src\Order;

class OrderContent implements FileContent
{
    private $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function content(): array
    {
        return [
            'client_id' => $this->order->clientId,
            'date' => $this->order->date->format('Y-m-d'),
            'budget' => (new BudgetContent($this->order->budget))->content() ?? null
        ];
    }
}