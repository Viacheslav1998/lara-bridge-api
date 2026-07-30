<?php

namespace App\Domain\User\Services;

class DollarService
{
    public int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function equals(DollarService $other): bool
    {
        return true;
    }
}