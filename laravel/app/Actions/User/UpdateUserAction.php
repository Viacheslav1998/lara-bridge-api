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
     * @param array $data request
     * @param int $userId ID user for update
     */
    public function execute(array $data, int $userId)
    {
        return $this->service->updateCurrentUser($userId, $data);
    }
}
