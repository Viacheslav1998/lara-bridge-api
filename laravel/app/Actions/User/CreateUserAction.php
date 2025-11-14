<?php

namespace App\Actions\User;

use App\Domain\User\Services\UserService;

class CreateUserAction
{
    public function __construct(
        private UserService $service
    ) {}

    public function execute(array $data)
    {
        return $this->service->createUser($data);
    }
}