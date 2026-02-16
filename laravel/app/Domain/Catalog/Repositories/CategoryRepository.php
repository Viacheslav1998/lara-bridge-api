<?php

namespace App\Domain\Catalog\Repositories;

use App\Domain\Catalog\Entities\Category;

class CategoryRepository
{
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function findBySlug(string $slug)
    {
        return Category::where('slug', $slug)->first();
    }
}
