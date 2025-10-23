<?php

namespace App\Domain\User\Services;

use App\Domain\User\Repositories\UserRepository;
use App\Exceptions\InvalidFilterException;

class UserService 
{ 
	private $allowedFilters = ['country', 'first_name', 'email'];

	public function __construct(protected UserRepository $users) 
	{	}

	public function findUsersByFilters(array $filters)
	{
		$InvalidFilters = array_diff(array_keys($filters), $this->allowedFilters);

		if (!empty($InvalidFilters)) {
			$InvalidFilterName = reset($InvalidFilters);
			throw new InvalidFilterException("Invaid filter: '{$InvalidFilterName}' . Allowed filters are: " . implode(', ', $this->allowedFilters));
		}

		return $this->users->findByFilters($filters);
	}

	public function getUsersCount()
	{
		return $this->user->count();
	}

	public function getCurrentUser($id)
	{
		return $this->users->find($id);
	}

	public function getUsers(array $filters): array
	{
		$users = $this->users->findByFilters($filters);

		if ($users->isEmpty()) {
			throw new \DomainException("Пользователи не найдены");
			
		}

		return $users;
	}
}   