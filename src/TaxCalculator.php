<?

use Src\Budget;

class TaxCalculator
{
    /**
     *
     * @param Budget $budget
     * @return float
     */
    public function calculate(Budget $budget)
    {
        return $budget->value * 0.1;
    }
}