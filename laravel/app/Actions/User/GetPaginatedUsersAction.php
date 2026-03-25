<?php

namespace App\Actions\User;

use App\Domain\User\Repositories\UserRepository;
use App\Http\Resources\User\UserResource;

class GetPaginatedUsersAction
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $perPage)
    {
        $users = $this->repository->getPaginated($perPage);

        return UserResource::collection($users)->toResponse(request())->getData(true);
    }
}
