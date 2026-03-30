<?php

namespace App\Actions\Category;

use App\Domain\Catalog\Repositories\CategoryRepository;

class CreateCategoryAction
{
    protected CategoryRepository $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function execute(array $data)
    {
        return $this->category->create($data);
    }
}