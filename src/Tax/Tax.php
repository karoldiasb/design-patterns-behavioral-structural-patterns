<?php

namespace Src\Tax;

use Src\Budget;

interface Tax
{
    public function calculate(Budget $budget): float;
}