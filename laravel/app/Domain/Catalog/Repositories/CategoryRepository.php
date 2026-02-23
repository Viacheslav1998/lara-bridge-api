<?php

namespace App\Domain\Catalog\Repositories;

use App\Domain\Catalog\Entities\Category;

class CategoryRepository
{
    // use refreshDatabase
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function findBySlug(string $slug)
    {
        return Category::where('slug', $slug)->first();
    }

    public function getAll()
    {
        return Category::all();
    }

    public function findById(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function find(int $id): ?Category
    {
        return Category::find($id);
    }

}
