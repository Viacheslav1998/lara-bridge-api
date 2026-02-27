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

        $this->assertInstanceOf(Category::class, $category);
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Laptop',
            'slug' => 'laptop'
        ]);
    }

    #[Test]
    public function it_updates_existing_category(): void
    {
        Category::factory()->create(['name' => 'Old name', 'slug' => 'apple']);

        $result = $this->repository->updateOrCreate('apple', ['name' => 'New Name']);

        $this->assertEquals('New Name', $result->first()->name);
        $this->assertDatabaseCount($result, 1);
        $this->assertDatabaseHas($result, ['slug' => 'apple', 'name' => 'New Name']);
    }

    #[Test]
    public function it_creates_new_category_if_not_exists(): void
    {
        $result = $this->repository->updateOrCreate('samsung', ['name' => 'Samsung Electronics']);

        $this->assertDatabaseCount($result, 1);
        $this->assertDatabaseHas($result, ['slug' => 'samsung']);
    }

    #[Test]
    public function it_can_delete_category(): void
    {
        $category = Category::factory()->create();

        $this->repository->delete($category->id);   

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id
        ]);
    }

    #[Test]
    public function it_can_returns_all_categories()
    {
        Category::factory()->create(['name' => 'Category 1', 'slug' => 'cat-1']);
        Category::factory()->create(['name' => 'Category 2', 'slug' => 'cat-2']);

        $result = $this->repository->getAll();

        $this->assertCount(2, $result);
        $this->assertEquals('Category 1', $result->first()->name);
    }

    #[Test]
    public function it_can_find_category_by_id()
    {
        $category = Category::factory()->create();

        $found = $this->repository->findById($category->id);

        $this->assertTrue($category->is($found));
    }

    #[Test]
    public function it_returns_null_when_category_not_found()
    {
        $result = $this->repository->find(99999);

        $this->assertNull($result);
    }

    #[Test]
    public function it_throws_exception_when_category_not_found()
    {
        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);

        $this->repository->findById(99999);
    }

    #[Test]
    public function it_cannot_create_category_with_duplicate_slug()
    {
        Category::factory()->create([
            'slug' => 'laptop'
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        $this->repository->create([
            'name' => 'Another Laptop',
            'slug' => 'laptop'
        ]);
    }

    #[Test]
    public function it_fails_to_save_without_required_fields(): void
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        $this->repository->create(['slug' => 'only-slug']);
    }

    #[Test]
    public function it_can_filter_categories_by_name_via_repository(): void
    {
        Category::factory()->create(['name' => 'Apple', 'slug' => 'apple']);
        Category::factory()->create(['name' => 'Samsung', 'slug' => 'samsung']);

        $results = $this->repository->searchByName('Apple');

        $this->assertCount(1, $results);
        $this->assertEquals('apple', $results->first()->slug);
    }

    #[Test]
    public function it_returns_empty_collections_when_no_categories_exists(): void
    {
        $results = $this->repository->getAll();

        $this->assertTrue($results->isEmpty());
        $this->assertCount(0, $results);
    }

}
