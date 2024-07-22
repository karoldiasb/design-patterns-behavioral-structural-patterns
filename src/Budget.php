<?php

namespace Src;
use Src\BudgetStates\OnApproval;
use Src\BudgetStates\State;

class Budget 
{
    public float $value;
    public int $itensQuantity;
    public bool $isPassengerCar;
    public State $state;

    public function __construct()
    {
        $this->state = new OnApproval();
    }

    public function applyExtraDiscount()
    {
        $this->value -= $this->state->calculateExtraDiscount($this);
    }

    public function approve()
    {
        $this->state->approve($this);
    }
    
    public function disapprove()
    {
        $this->state->disapprove($this);
    }

    public function end()
    {
        $this->state->end($this);
    }
}