<?php

namespace App\Http\Controllers\Api;

use App\Actions\CreateCategoryAction;
use App\Http\Requests\Category\CreateCategoryRequest;
// use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Responses\ApiResponse;

class CategoryController
{

   /**
     * Store a Categories
     */
   public function store(CreateCategoryRequest $request, CreateCategoryAction $action)
   {
        $category = $action->execute($request->validated());

        return ApiResponse::success()
   }

}
