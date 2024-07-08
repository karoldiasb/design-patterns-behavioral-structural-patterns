<?

namespace Src\Tax;

use Src\Budget;

class Iss implements Tax
{
    /**
     *
     * @param Budget $budget
     * @return float
     */
    public function calculate(Budget $budget): float
    {
        return $budget->value * 0.1;
    }
}

