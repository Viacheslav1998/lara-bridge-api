<?php

namespace Tests\Feature\Api\Catalog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function test_can_create_category()
    {
        $payload = [
            'name' => 'Phones',
            'slug' => 'phones',
        ];

        $response = $this->postJson('/api/categories', $payload);

        $response->assertStatus(201);

        $response->assertJson(
            fn ($json) =>
          $json
              ->whereType('name', 'string')
              ->whereType('slug', 'string')
        );

        $this->assertDatabaseHas('categories', [
            'name' => 'Phones',
            'slug' => 'phones'
        ]);
    }


}
