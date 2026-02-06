<?php

namespace App\Http\Controllers\Analytics;

use App\Domain\User\Services\UserService;

class UserAnalyticsController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getCountUsers()
    {
        return 'total 5712 users - "example"';
    }
}
