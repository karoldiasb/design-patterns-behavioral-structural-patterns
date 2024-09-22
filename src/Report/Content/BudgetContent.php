<?php

namespace Src\Report\Content;

use Src\Budget;

class BudgetContent implements FileContent
{
    private $budget;
    public function __construct(Budget $budget)
    {
        $this->budget = $budget;
    }

    public function content(): array
    {
        return [
            'value' => $this->budget->value,
            'items_quantity' => $this->budget->itensQuantity
        ];
    }
}