<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository
{
    public function findByFilters(array $filters)
    {
        $query = User::query();

        $query->where(function ($q) use ($filters) {
            if (isset($filters['country'])) {
                $q->orWhere('country', $filters['country']);
            }
            if (isset($filters['email'])) {
                $q->orWhere('email', $filters['email']);
            }
            if (isset($filters['first_name'])) {
                $q->orWhere('first_name', $filters['first_name']);
            }
        });

        return $query->get();
    }

    public function count(): int
    {
        return User::query()->count();
    }

    public function find(int $id)
    {
        return User::find($id);
    }

    public function destroy(int $id)
    {
        return User::destroy($id);
    }

    /**
     * update user
     */
    public function update(User $user, array $data): User
    {
        $user->update($data);
        return $user;
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function getPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return User::query()->paginate($perPage);
    }

}
