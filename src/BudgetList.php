<?php

namespace Src;

class BudgetList implements \IteratorAggregate
{
    /**
     * @var Budget[]
     */
    private array $budgets = [];

    public function add(Budget $budget)
    {
        $this->budgets[] = $budget;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->budgets);
    }
}