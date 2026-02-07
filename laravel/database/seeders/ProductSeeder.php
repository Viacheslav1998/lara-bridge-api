<?php

namespace Database\Seeders;

use App\Domain\Catalog\Entities\Category;
use App\Domain\Catalog\Entities\Product;
use App\Domain\Catalog\Entities\ProductSku;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        
        $categories->each(function ($category) {
            Product::factory(10)
              ->has(ProductSku::factory->count(3), 'skus')
              ->create([
                'category_id' => $category->id,
              ]);
        });
    }
}
