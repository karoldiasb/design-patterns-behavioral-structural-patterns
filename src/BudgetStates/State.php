<?php 

namespace Src\BudgetStates;

use Src\Budget;

abstract class State 
{
    /**
     * @param \Src\Budget $budget
     * @throws \Exception
     * @return float
     */
    abstract public function calculateExtraDiscount(Budget $budget): float;

    public function approve(Budget $budget)
    {
        throw new \Exception('cannot be approved');
    }
    
    public function disapprove(Budget $budget)
    {
        throw new \Exception('cannot be disapproved');
    }

    public function end(Budget $budget)
    {
        throw new \Exception('cannot be ended');
    }
}