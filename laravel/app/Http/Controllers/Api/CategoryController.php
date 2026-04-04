<?php

namespace App\Http\Controllers\Api;

use App\Actions\Category\CreateCategoryAction;
use App\Http\Requests\Category\CreateCategoryRequest;
// use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoriesResource;
use App\Http\Responses\ApiResponse;

class CategoryController
{
    /**
      * Store a Categories
      */
    public function store(CreateCategoryRequest $request, CreateCategoryAction $action)
    {
        $category = $action->execute($request->validated());

        return ApiResponse::success(
            new CategoriesResource($category),
            'Category created successfully',
            201
        );
    }

}
