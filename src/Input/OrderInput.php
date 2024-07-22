<?php

namespace Src\Input;

class OrderInput
{
    private int $clientId;
    private int $budgetValue;
    private int $budgetQtItems;
    
    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return void
     */
    public function setClientId(int $clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return int
     */
    public function getBudgetValue()
    {
        return $this->budgetValue;
    }

    /**
     * @param int $budgetValue
     * @return void
     */
    public function setBudgetValue(int $budgetValue)
    {
        $this->budgetValue = $budgetValue;
    }

    /**
     * @return int
     */
    public function getBudgetQtItems()
    {
        return $this->budgetQtItems;
    }

    /**
     * @param int $budgetQtItems
     * @return void
     */
    public function setBudgetQtItems(int $budgetQtItems)
    {
        $this->budgetQtItems = $budgetQtItems;
    }
}