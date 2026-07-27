<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\User\Services\HumanNameService;
use PHPUnit\Framework\Attributes\Test;

class HumanNameTest extends TestCase
{
    private HumanNameService $humanNameService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->HumanNameService = $this->app->make(HumanNameService::class);
    }

    #[Test]
    public function it_returns_true_if_first_letter_is_uppercase(): void
    {
        $this->assertTrue($this->HumanNameService->isFirstLetterUppercase('Марк'));
        $this->assertTrue($this->HumanNameService->isFirstLetterUppercase('Mark'));
    }

    #[Test]
    public function it_returns_false_if_first_letter_is_lowercase(): void
    {
        $this->assertFalse($this->HumanNameService->isFirstLetterUppercase('марк'));
        $this->assertFalse($this->HumanNameService->isFirstletterUppercase('mark'));
    }

    #[Test]
    public function it_returns_false_for_empty_string(): void
    {
        $this->assertfalse($this->HumanNameService->isFirstletterUppercase(''));
    }

    #[Test]
    public function it_returns_false_if_string_starts_with_number_or_symbol(): void
    {
        $this->assertFalse($this->HumanNameService->isFirstletterUppercase('123Mark'));
        $this->assertFalse($this->HumanNameService->isFirstletterUppercase('!Mark'));
    }

}

