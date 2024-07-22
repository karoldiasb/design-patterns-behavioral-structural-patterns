<?php 

namespace Src\BudgetStates;

use Src\Budget;

class Finished extends State
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new \Exception('discount cannot be applied');
    }
}