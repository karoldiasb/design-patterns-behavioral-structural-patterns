<?php

namespace Src\Tax;

use Src\Budget;

abstract class TaxTwoRates implements Tax
{
    public function calculate(Budget $budget): float
    {
        if($this->mustApplyMaxRate($budget)){
            return $this->calculateMaxRate($budget);
        }

        return $this->calculateMinRate($budget); 
    }

    abstract protected function mustApplyMaxRate(Budget $budget): bool;
    abstract protected function calculateMaxRate(Budget $budget): float;
    abstract protected function calculateMinRate(Budget $budget): float;
}