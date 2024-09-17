<?php

namespace Src;

use Src\BudgetStates\Finished;
use Src\Http\HttpAdapter;

class BudgetRegister
{
    private HttpAdapter $http;

    public function __construct(HttpAdapter $http)
    {
        $this->http = $http;
    }

    public function register(Budget $budget)
    {
        if(!$budget->state instanceof Finished){
            throw new \DomainException('budget only can register when state is finished');
        }

        $this->http->post('/budgets/register', [
            'value' => $budget->value
        ]);
    }
}