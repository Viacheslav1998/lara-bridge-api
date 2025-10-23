<?php 

namespace App\Actions\User;

use App\Domain\User\Repositories\UserRepositories;

/**
 * getUsersCountAction
 */
class GetUsersCountAction
{
	
	protected $userRepository;

	function __construct(UserRepository $userRepository)
	{
		$userRepository = $this->userRepository;
	}

	public function execute(): int
	{
		return $this->userRepository->count();
	}
}