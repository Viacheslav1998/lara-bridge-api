<?php

namespace App\Domain\User\Services;

use App\Domain\User\Repositories\UserRepository;
use App\Exceptions\InvalidFilterException;

class UserService 
{ 
	private $allowedFilters = ['country', 'first_name', 'email'];

	public function __construct(
		protected UserRepository $repository
	) {}

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

	public function getCurrentUser($id)
	{
		return $this->repository->find($id);
	}

	public function createUser(array $data)
	{
		return $this->repository->create($data);
	}

}   