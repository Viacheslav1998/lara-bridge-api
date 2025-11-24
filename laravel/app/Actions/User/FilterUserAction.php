<?php

namespace App\Actions\User;

use App\Domain\User\Repositories\UserRepository;

class FilterUserAction
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
    * execute filters users for params
    * without service
    */
    public function execute(array $filters)
    {
        return $this->repository->findByFilters($filters);
    }

}
