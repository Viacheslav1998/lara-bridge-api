<?php

namespace App\Domain\Catalog\Repositories;

use App\Domain\Catalog\Entities\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function updateOrCreate(string $slug, array $data = [])
    {
        return Category::updateOrCreate(
            ['slug' => $slug],
            $data
        );
    }

    public function findBySlug(string $slug)
    {
        return Category::where('slug', $slug)->first();
    }

    public function delete(int $id): bool
    {
        $category = Category::findOrFail($id);
        return $category->delete();
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

    public function searchByName(string $name): Collection
    {
        return Category::where('name', 'like', "%{$name}%")->get();
    }

}
