<?php

namespace App\Http\Controllers\Api;

use App\Domain\User\Services\UserService;
use App\Http\Requests\UserFilterRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    public function index(UserFilterRequest $request)
    {
        $filters = $request->validated();
        $users = $this->userService->findUsersByFilters($filters);

        if ($users->isEmpty()) {
             Log::error('Error users not found');
            throw new ModelNotFoundException('No users Found.');
        }

        return ApiResponse::success(
            UserResource::collection($users),
            'users list retrieved successfully'
        );
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
