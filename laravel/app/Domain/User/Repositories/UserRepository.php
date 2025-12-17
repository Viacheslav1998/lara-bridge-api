<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator; 

class UserRepository
{
    public function getUsers(): Collection
    {
        return User::all();
    }

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

    public function findById(int $id): User
    {
        return User::findOrFail($id);
    }

    public function destroy(int $id)
    {
        return User::destroy($id);
    }

    /**
     * Attention!
     * you can use User::updateOrCreate
     * =====
     *
     * update current user, use Eloquent update() method.
     *
     * @param User $user if exists.
     * @param array $data for udpate.
     * @return User updated model.
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
