<?

use Src\Budget;
use Src\Discount\DiscountItem\DiscountItem;
use Src\Discount\DiscountValue\DiscountValue;
use Src\Discount\NoDiscount\NoDiscount;

class DiscountCalculator
{
    /**
     *
     * @param Budget $budget
     * @return float
     */
    public function calculate(Budget $budget)
    {
        $noDiscount = new NoDiscount();
        $discountValue = new DiscountValue($noDiscount);
        $discountChain = new DiscountItem($discountValue);

        return $discountChain->calculate($budget);
    }
}