<?

namespace Src\Discount\NoDiscount;

use Src\Budget;
use Src\Discount\Discount;

class NoDiscount extends Discount
{
    public function __construct()
    {
        parent::__construct();
    }

    public function calculate(Budget $budget): float
    {
        return 0;
    }
}