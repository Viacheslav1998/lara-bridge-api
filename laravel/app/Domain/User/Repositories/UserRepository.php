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

            if (isset($filters['country'])) {
                $query->where('country', $filters['country']);
            }

            if (isset($filters['first_name'])) {
                $query->where('first_name', $filters['first_name']);
            }

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

        // Query-Builder  
    

        public function all_x() 
        {
            return User::query()->paginate(10);
        } 

}