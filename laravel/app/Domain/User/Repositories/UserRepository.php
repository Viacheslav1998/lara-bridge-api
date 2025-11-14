<?php 

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data)
    {
        return User::create($data);
    } 

    public function all_x() 
    {
        return User::query()->paginate(10);
    } 

}