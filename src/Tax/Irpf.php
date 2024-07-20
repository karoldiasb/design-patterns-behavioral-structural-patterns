<?php

namespace Src\Tax;

use Src\Budget;

class Irpf extends TaxTwoRates
{
    protected function mustApplyMaxRate(Budget $budget): bool
    {
        return $budget->value > 6.147;
    }

    protected function calculateMaxRate(Budget $budget): float
    {
        return $budget->value * 0.275;
    }

    protected function calculateMinRate(Budget $budget): float
    {
        return $budget->value * 0.075;
    }
}

