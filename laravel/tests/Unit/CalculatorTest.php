<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Domain\User\Services\CalculatorService;

class CalculatorTest extedns TestCase
{
    $calculator = new CalculatorService();

    $result = $calculator->add(5, 10);

    $this->assertEquals(15, $result);
}