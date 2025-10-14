<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Domain\User\Services\UserService;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserService $service)
    {
        $users = $service->users();
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
