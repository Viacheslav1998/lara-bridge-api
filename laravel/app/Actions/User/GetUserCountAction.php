<?php

namespace App\Actions\User;

use App\Domain\User\Repositories\UserRepository;

/**
 * getUsersCountAction
 */
class GetUserCountAction
{
    public function __construct(
        UserRepository $userRepository
    ) {
    }

    public function execute(): int
    {
        return $this->userRepository->count();
    }
}
