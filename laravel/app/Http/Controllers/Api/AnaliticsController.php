<?php

namespace App\Http\Controllers\Api;

use App\Domain\User\Services\UserService;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Request;

class AnaliticsController
{
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    
    pulic function getCountUsers()
    {
        
    }
}
