<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserFilterRequest;
use App\Domain\User\Services\UserService;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class UserController
{
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Custom default index
     * filters [country, first_name]
     * is empty - default get all
     */
    public function index(Request $request)
    {
        try {
            $filters = $request->all();
            $users = $this->userService->findUsersByFilters($filters);

            if ($users->isEmpty()) {
                return ApiResponse::error("No Users Found", 404, "Resources nit Found");
            }

            return ApiResponse::success(UserResource::collection($users), "users list");
        } catch (\Throwable $e) {
            \Log::error("UserController@index error", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return ApiResponse::serverError("Something went wrong", [
                'exception' => class_basename($e),
                'message' => $e->getMessage(),
            ]);
        }
    }

    pulic function getCountUsers()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
