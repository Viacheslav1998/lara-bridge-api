<?php

namespace Tests\Integration\Catalog;

use App\Domain\Catalog\Entities\Category;
use App\Domain\Catalog\Repositories\CategoryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private CategoryRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        // Initialize the repository.
        $this->repository = new CategoryRepository();
    }

    #[Test]
    public function it_can_store_a_category_in_database()
    {
        $data = [
            'name' => 'Laptop',
            'slug' => 'laptop'
        ];

        $category = $this->repository->create($data);

        $this->assertInstanceOf($category::class, $category);
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Laptop',
            'slug' => 'laptop'
        ]);
    }

    #[Test]
    public function it_can_returns_all_categories()
    {
        Category::factory()->create(['name' => 'Category 1', 'slug' => 'cat-1']);
        Category::factory()->create(['name' => 'Category 2', 'slug' => 'cat-2']);

        $result = Category::all();

        $this->assertCount(2, $result);
        $this->assertEquals('Category 1', $result->first()->name);
    }

}
