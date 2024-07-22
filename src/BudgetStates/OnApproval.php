<?php 

namespace Src\BudgetStates;

use Src\Budget;

class OnApproval extends State
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        return $budget->value * 0.05;
    }

    public function approve(Budget $budget)
    {
        $budget->state = new Approved();
    }
    
}