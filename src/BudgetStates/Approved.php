<?php 

namespace Src\BudgetStates;

use Src\Budget;

class Approved extends State
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        return $budget->value * 0.02;
    }

    public function end(Budget $budget)
    {
        $budget->state = new Finished();
    }
    
}