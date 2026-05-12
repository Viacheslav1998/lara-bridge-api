<?php

namespace App\Domain\User\Services;

use App\Domain\User\Repositories\UserRepository;
use App\Exceptions\InvalidFilterException;

class UserService
{
    private $allowedFilters = ['country', 'first_name', 'email'];

    public function __construct(
        protected UserRepository $repository
    ) {
    }

    public function findUsersByFilters(array $filters)
    {
        $InvalidFilters = array_diff(array_keys($filters), $this->allowedFilters);

        if (!empty($InvalidFilters)) {
            $InvalidFilterName = reset($InvalidFilters);
            throw new InvalidFilterException("Invaid filter: '{$InvalidFilterName}' . Allowed filters are: " . implode(', ', $this->allowedFilters));
        }

        return $this->repository->findByFilters($filters);
    }

    public function getUsersCount()
    {
        return $this->repository->count();
    }

    public function getCurrentUser(int $id)
    {
        return $this->repository->find($id);
    }

    public function destroyUser(int $userId)
    {
        return $this->repository->destroy($userId);
    }

    public function createUser(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateCurrentUser(int $userId, array $data)
    {
        $user = $this->repository->findById($userId);

        return $this->repository->update($user, $data);
    }

}
