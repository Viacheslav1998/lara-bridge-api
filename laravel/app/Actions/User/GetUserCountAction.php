<?php

namespace App\Actions\User;

use App\Domain\User\Repositories\UserRepository;

/**
 * getUsersCountAction
 */
class GetUserCountAction
{
    protected UserRepository $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function execute(): int
    {
        return $this->user->count();
    }
}
