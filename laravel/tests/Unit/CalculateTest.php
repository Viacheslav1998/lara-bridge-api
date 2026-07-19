<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\User\Services\CalculateService;
use PHPUnit\Framework\Attributes\Test;

class CalculateTest extends TestCase
{


    #[Test]
    public function it_super_test()
    {
        echo '13';
    }

    // #[Test]
    // public function it_just_test_calculate()
    // {
    //     $calculator = new CalculateService();

    //     $result = $calculator->add(5, 10);

    //     $this->assertEquals(15, $result);
    // }
}