<?php

namespace App\Domain\User\Services;

class CalculateService
{

    public $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }  

    public function times(int $multiplier)
    {
        $this->amount *= $multiplier;

        return $this->amount;
    }

}