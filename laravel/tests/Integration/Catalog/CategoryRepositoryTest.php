<?php

namespace Tests\Integration\Catalog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_category_to_database(): void
    {
        $data = [ 'name' => 'Куртки', 'slug' => 'kurtki'];

        $repository = new \App\Domain\Catalog\Repositories\CategoryRepository();

        $category = $repository->create($data);

        $this->assertInstanceOf(\App\Domain\Catalog\Entities\Category::class, $category);

        $this->assertDatabaseHas('categories', $data);

        $this->assertNotNull($category->id);
    }

}
