<?php

namespace Tests\Integration\Catalog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_save_a_category_to_database(): void
    {
        $data = [ 'name' => 'Куртки', 'slug' => 'kurtki'];
        $repository = new \App\Domain\Catalog\Repositories\CategoryRepository();

        $category = $repository->save($data);

        $this->assertInstanceOf(\App\Domain\Catalog\Entities\Category::class, $category);

        $this->assertDatabaseHas('categories', $data);
    }

}
