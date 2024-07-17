<?

namespace Src\Discount\DiscountItem;

use Src\Budget;
use Src\Discount\Discount;

class DiscountItem extends Discount
{
    public function calculate(Budget $budget): float
    {
        if($budget->itensQuantity > 5){
            return $budget->value * 0.01;
        }

        return $this->nextDiscount->calculate($budget);
    }
}