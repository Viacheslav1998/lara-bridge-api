<?php

namespace App\Actions\User;

use App\Domain\User\Repositories\UserRepository;

class FilterUsersAction
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository) 
    {
        $this->repository = $repository;
    }

    /**
    * Execute filters users for params
    */
    public function execute(array $filters)
    {
        return $this->repository->findByFilters($filters);
    } 

}