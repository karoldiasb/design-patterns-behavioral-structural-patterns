<?php

namespace Src\Tax;

use Src\Budget;

class Ipva extends TaxTwoRates
{
    protected function mustApplyMaxRate(Budget $budget): bool
    {
        return $budget->isPassengerCar;
    }

    protected function calculateMaxRate(Budget $budget): float
    {
        return $budget->value * 0.03;
    }

    protected function calculateMinRate(Budget $budget): float
    {
        return $budget->value * 0.01;
    }
}

