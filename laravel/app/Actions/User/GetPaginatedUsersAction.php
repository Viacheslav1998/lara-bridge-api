<?php

namespace App\Actions\User;

use App\Domain\User\Repositories\UserRepository;
use App\Http\Resource\UserResource;

class GetPaginatedUsersAction
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $perPage): array
    {
        $user = $this->repository->getPaginated($perPage);

        return UserResource::collection($user)->response->getData(true);
    }
}
