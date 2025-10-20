<?php

namespace App\Http\Controllers\Api;

use App\Domain\User\Services\UserService;
use App\Http\Requests\UserFilterRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\UserResponse;

class UserController
{
    public function __construct(
        private UserService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(UserService $service)
    {
        try {
            $users = $this->service->users();
        } catch (\DomainException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }

        return response()->json($users);
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
