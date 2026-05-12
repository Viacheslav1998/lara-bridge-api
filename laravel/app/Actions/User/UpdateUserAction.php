<?php

namespace App\Actions\User;

use App\Domain\User\Models\User;
use App\Domain\User\Repositories\UserRepository;

class UpdateUserAction
{
    public function __construct(
        private UserRepository $repository
    ) {
    }

    /**
     *execute update user
     */
    public function execute(array $data, User $user): User
    {
        return $this->repository->update($user, $data);
    }
}
