<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;
use Illuminate\Database\Eloquent\Collection;

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

    public function find(int $id): User
    {
        return User::find($id);
    }

    public function findById(int $id): User
    {
        return User::findOrFail($id);
    }

    /**
     * Attention 
     * you can use User::updateOrCreate
     */
    public function update(array $data): User
    {
        return User::update($data);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function getChank(): LengthAwarePaginator
    {
        return User::query()->paginate(10);
    }

}
