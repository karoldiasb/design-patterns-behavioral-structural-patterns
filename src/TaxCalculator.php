<?php

namespace Src;

use Src\Budget;
use Src\Tax\Tax;

class TaxCalculator
{
    /**
     *
     * @param Budget $budget
     * @return float
     */
    public function calculate(Budget $budget, Tax $tax)
    {
        return $tax->calculate($budget);
    }
}