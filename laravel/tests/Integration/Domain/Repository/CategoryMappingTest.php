<?php

namespace Tests\Integration\Domain\Repository;

use App\Domain\Catalog\Entities\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryMappingTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_save_a_category_to_database(): void
    {
        $data = [
            'name' => 'Куртки',
            'slug' => 'kurtki'
        ];

        Category::create($data);

        $this->assertDatabaseHas('categories', [
            'name' => 'Куртки',
            'slug' => 'kurtki'
        ]);
    }

}
