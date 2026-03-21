<?php

namespace Tests\Feature\Api\Catalog;

use App\Domain\Catalog\Entities\Category;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function test_can_create_category()
    {
        // 1. data
        $payload = [
            'name' => 'Phones',
            'slug' => 'phones',
        ];

        // 2. request
        $response = $this->postJson('/api/categories', $payload);

        // 3. check answer
        $response->assertStatus(201);

        // 4. check json
        $response->assertJson(fn ($json) => 
          $json
              ->whereType('name', 'string') 
              ->whereType('slug', 'string')
        );

        // 5. check database
        $this->assertDatabaseHas('categories', [
            'name' => 'Phones',
            'slug' => 'phones'
        ]);
    }

    
}
