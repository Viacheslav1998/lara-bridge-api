<?php

namespace App\Actions\User;

use App\Domain\User\Models\User;
use App\Domain\User\Repositories\UserRepository;



class CreateUserAction
{

    public function __construct(
        private UserRepository $repository;
    ) {}

    /**
    * execute create new user
    */
    public function execute(array $data): User
    {
        $user = $this->repository->create($data);

        // may create event domain

        return $user;
    }
}
