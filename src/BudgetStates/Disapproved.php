<?php 

namespace Src\BudgetStates;

use Src\Budget;

class Disapproved extends State
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new \Exception('discount cannot be applied');
    }

    public function end(Budget $budget)
    {
        $budget->state = new Finished();
    }
    
}