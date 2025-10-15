<?php

namespace App\Domain\User\Services;

use App\Domain\User\Repositories\UserRepository;

class UserService 
{ 
	public function __construct(
		protected UserRepository $repository
	) {}


	public function get($id)
	{
		return $this->repository->find($id);
	}

	public function getUsers(array $filters = [])
	{
		return $this->repository->all($filters);
	}
}   