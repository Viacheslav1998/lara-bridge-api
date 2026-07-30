<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\User\Services\CalculateService;
use App\Domain\User\Services\DollarService;

use PHPUnit\Framework\Attributes\Test;

class CalculateTest extends TestCase
{
    #[Test]
    public function it_calculator_can_add_number_to_base()
    {
        $clc = new CalculateService(5);
        
        $product = $clc->times(2);

        $this->assertEquals(10, $product->amount);

        $product = $clc->times(3);

        $this->assertEquals(15, $product->amount);
    }

    #[Test]
    public function it_equality(): void
    {
        // $this->assertTrue((new DollarService(5))->equals(new DollarService(5)));

        $fiveDollarsA = new DollarService(5);
        $fiveDollarsB = new DollarService(5);

        $result = $fiveDollarsA->equals($fiveDollarsB);

        $this->assertTrue($result);
    }

}

