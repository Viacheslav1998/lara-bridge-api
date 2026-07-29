<?php

namespace App\Domain\User\Services;

class CalculateService
{

    public $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }  

    public function times(int $multiplier): self
    {
        return new self($this->amount * $multiplier);
    }

}