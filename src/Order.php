<?php

namespace Src;

use Src\Budget;

class Order 
{
    public \DateTime $date;
    public int $clientId;
    public Budget $budget;
}