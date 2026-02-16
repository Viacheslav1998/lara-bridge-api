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
    
   }

}
