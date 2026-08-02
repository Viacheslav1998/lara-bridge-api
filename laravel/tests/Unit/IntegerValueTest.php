<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\User\Services\CalculateService;
use App\Domain\User\Services\DollarService;
use App\Domain\User\Services\IntegerService;

use PHPUnit\Framework\Attributes\Test;

class IntegerValueTest extends TestCase
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
    public function it_asserts_equality_of_dollar_objects(): void
    {
        $fiveDollars1 = new DollarService(5);
        $fiveDollars2 = new DollarService(5);
        $sixDollars = new DollarService(6);

        $this->assertTrue($fiveDollars1->equals($fiveDollars2));
        $this->assertFalse($fiveDollars1->equals($sixDollars));
    }


}

