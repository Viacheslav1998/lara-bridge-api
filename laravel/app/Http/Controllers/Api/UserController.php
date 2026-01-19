<?php

namespace App\Http\Controllers\Api;

use App\Actions\User\CreateLogAction;
use App\Actions\User\CreateUserAction;
use App\Actions\User\FilterUserAction;
use App\Actions\User\GetPaginatedUsersAction;
use App\Actions\User\UpdateUserAction;
use App\Domain\User\Entities\User;
use App\Domain\User\Services\UserService;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserIndexRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;

class UserController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * User paginate
     */
    public function index(UserIndexRequest $request, GetPaginatedUsersAction $action)
    {
        $resourceCollection = $action->execute(
            $request->input('per_page', 10)
        );

        return ApiResponse::success($resourceCollection, 'User retrieved', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request, CreateUserAction $action)
    {
        $validatedData = $request->validated();

        $user = $action->execute($request->validated());

        return ApiResponse::success(
            new UserResource($user),
            'User created successfully',
            201
        );
    }


    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = $this->userService->getCurrentOrFail($id);

        return ApiResponse::success(
            new UserResource($user),
            'user was just found',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     * userId = received via Route Bildung model
     */
    public function update(UpdateUserRequest $request, User $user, UpdateUserAction $action)
    {
        $updatedUser = $action->execute($request->validated(), $user->id);

        return ApiResponse::success(
            new UserResource($updatedUser),
            'User was updated successfully',
            201
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = $this->userService->getCurrentUser($id);

        if (!empty($user)) {
            $this->userService->destroyUser($id);
            return apiResponse::success(
                $user,
                'The user has been successfully deleted.',
                200
            );
        }

        return apiResponse::error('User not Found!', 404, 'Current User Not Found');

    }

    /**
     * Find users using filters
     */
    public function filter(Request $request, FilterUserAction $action)
    {
        $filters = $request->all();
        $users = $action->execute($filters);

        if ($users->isEmpty()) {
            return ApiResponse::error('No users founds', 404);
        }

        return ApiResponse::success(UserResource::collection($users));
    }

    /** just test logs/works/jobs */
    public function logsAttention(CreateLogAction $action)
    {
        $logs = $action->execute();
        return ApiResponse::success($message = 'Log/Jobs - successfull - next work');
    }
}
