<?php

namespace App\Actions\User;

use App\Domain\User\Repositories\UserRepository;

class DestroyUserAction
{
    public function __construct(
        private UserRepository $repository
    ) {
    }

    /**
    * execute Destroy User
    */
    public function execute(int $userId)
    {
        return $this->repository->destroy($userId);
    }
}
