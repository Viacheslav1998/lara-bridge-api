<?php 

namespace App\Actions\User;

use App\Domain\User\Repositories\UserRepositories;

/**
 * getUsersCountAction
 */
class GetUsersCountAction
{
	function __construct(
		UserRepository $userRepository
	) {}

	public function execute(): int
	{
		return $this->userRepository->count();
	}
}