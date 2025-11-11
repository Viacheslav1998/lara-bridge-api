<?php

namespace App\Http\Controllers\Api;

use App\Domain\User\Services\UserService;
use App\Domain\User\Repositories\UserRepository;
use App\Http\Requests\UserFilterRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use App\Actions\User\GetUsersCountAction;
use App\Actions\User\FilterUsersAction;
use Illuminate\Http\Request;

class UserController
{
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Get all Users 
     */
    public function index(UserRepository $userRepository)
    {
        $users = $userRepository->getUsers();

        if($users->isEmpty()) {
            throw new ModelNotFoundException('No users Found.');
        }

        return ApiResponse::success(UserResource::collection($users),
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

    /**
     * Find users using filters
     */
    public function filter(Request $request, FilterUsersAction $action)
    {
        $filters = $request->all();
        $users = $action->execute($filters);

        if ($users->isEmpty()) {
            return ApiResponse::error('No users founds', 404);
        }

        return ApiResponse::success(UserResource::collection($users));
    }
}
