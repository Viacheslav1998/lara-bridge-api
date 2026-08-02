<?php

namespace App\Domain\User\Services;

class DollarService
{
    public int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    // [mixed]type: str, int, obj ...
    public function equals(mixed $obj): bool
    {
        if(!$obj instanceof self)
        {
            return false;
        }

        return $this->amount === $obj->amount;
    }
}