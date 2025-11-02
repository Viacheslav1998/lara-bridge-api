<?php 

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;
use Illuminate\Support\Facades\Log;

class UserRepository
{
        // Eloquent

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

        public function save()
        {
            
        }

        public function all_x() 
        {
            return User::query()->paginate(10);
        } 

        // Query-Builder  
    

}