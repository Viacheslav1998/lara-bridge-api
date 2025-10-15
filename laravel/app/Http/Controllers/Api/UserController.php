<?php

namespace App\Http\Controllers\Api;

use App\Domain\User\Services\UserService;
use App\Http\Requests\UserFilterRequest;
use App\Http\Resources\UserResource;

class UserController
{
    public function __construct(
        private UserService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(UserFilterRequest $request)
    {
        $filters = $request->validated();

        try {

            $users = $this->service->getUsers($filters);

            return UserResponse::success(
                UserResource::collection($users),
                'Список пользователей получен!'
            );

        } catch (\Throwable $e) {
            return UserResponse::error('не удалось получить список пользователей', 500);
        }
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
