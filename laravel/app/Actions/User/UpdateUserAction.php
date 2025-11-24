<?php

namespace App\Actions\User;

use App\Domain\User\Services\UserService;

class UpdateUserAction
{
    public function __construct(
        private UserService $service
    ) {
    }

    /**
    * execute update current user
    */
    public function execute(array $data)
    {
        return $this->service->updateCurrentUser($data);
    }
}
