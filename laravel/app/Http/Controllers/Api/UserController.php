<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Domain\User\Services\UserService;
use App\Http\Request\UserFilterRequest;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserService $service, UserFilterRequest $request)
    {
        $filters = $request->validate();
        
        $user = $service->getFilterUsers($filters);

        return UserResource::collection($users);
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
