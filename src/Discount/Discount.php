<?php

namespace Src\Discount;

use Src\Budget;

abstract class Discount 
{
    protected ?Discount $nextDiscount;

    public function __construct(?Discount $nextDiscount = null)
    {
        $this->nextDiscount = $nextDiscount;        
    }

    abstract public function calculate(Budget $budget): float;
}