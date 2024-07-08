<?

namespace Src\Tax;

use Src\Budget;

class Icms implements Tax
{
    /**
     *
     * @param Budget $budget
     * @return float
     */
    public function calculate(Budget $budget): float
    {
        return $budget->value * 0.6;
    }
}

