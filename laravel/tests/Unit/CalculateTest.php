<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\User\Services\CalculateService;
use PHPUnit\Framework\Attributes\Test;

class CalculateTest extends TestCase
{
    #[Test]
    public function it_calculator_can_add_number_to_base()
    {
        $calculator = new CalculateService(5);
        
        $calculator->times(2);

        $this->assertEquals(10, $calculator->amount);
    }

}

