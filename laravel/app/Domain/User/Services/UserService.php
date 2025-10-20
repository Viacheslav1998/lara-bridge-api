<?php

namespace App\Domain\User\Services;

use App\Domain\User\Repositories\UserRepository;

class UserService 
{ 
	public function __construct(protected UserRepository $users) 
	{	}

	public function users()
	{
		return $this->users->all();
	}


	public function findUsersByFilters(array $filters)
	{
		return $this->users->findByFilters($filters);
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