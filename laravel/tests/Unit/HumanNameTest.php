<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\User\Services\HumanNameService;
use PHPUnit\Framework\Attributes\Test;

class HumanNameTest extends TestCase
{
    #[Test]
    public function it_test_first_letter()
    {
        $human = new HumanNameService();

        $human->isFirstLetterUppercase('SSLl');
    }


}

