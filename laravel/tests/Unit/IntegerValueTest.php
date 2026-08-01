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
    public function it_equality(): void
    {
        // $this->assertTrue((new DollarService(5))->equals(new DollarService(5))); kent way
        // $this->assertEquals(new DollarService(5), new DollarService(5)); php way

        $fiveDollarsA = new DollarService(5);
        $fiveDollarsB = new DollarService(5);
        $sixDollarC = new DollarService(6);

        $result = $fiveDollarsA->equals($fiveDollarsB);

        $this->assertTrue($result);
        // $this->assertFalse($fiveDollarsA->equals($sixDollarC));
    }


    #[Test]
    public function it_get_number_random_integer(): void
    {
        $number = new IntegerService();
        $this->assertIsInt($number->getNumber());
    }

}

