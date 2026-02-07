<?php

namespace Database\Seeders;

use App\Domain\Catalog\Entities\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['куртки', 'штаны', 'штаны', 'акссесуары'];

        foreach($categories as $name)
        {
            Category::create([
                'name' => $name,
                'slug' => $slug
            ]);
        }
    }
}
