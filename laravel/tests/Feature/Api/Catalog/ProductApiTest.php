<?php

namespace Tests\Feature\Api\Catalog;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    #[Test]
    public function it_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
