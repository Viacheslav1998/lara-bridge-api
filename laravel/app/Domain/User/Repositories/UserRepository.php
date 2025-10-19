<?php 

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;
use Illuminate\Support\Facades\Log;
/**
 * UserRepository
 */
class UserRepository
{
        // Eloquent

        /**
        * Get All /
        * Filters /
        * [Country, Active]
        */
        public function findByFilters(array $filters)
        {
            $query = User::query();

            Log::debug($query->toSql());

            if (!empty($filters['name'])) {
                $query->where('name', $filters['name']);
            }

            // Is one enough?
            if (!empty($filters['country'])) {
                $query->where('country', $filters['country']);
            }

            if (isset($filters['active'])) {
                if ($filters['active'] === 'null') {
                    $query->whereNull('active');
                } else {
                    $query->where('active', $filters['active']);
                }
            }

            return $query->get();
        } 

        /**
         * get current/id user
         */
        public function find($id)
        {
            return User::findOrFail($id);
        }

        public function save()
        {
            
        }

        // Query-Builder  
        
        /**
         * all data / paginate
         */
        public function all_x() 
        {
            return User::query()->paginate(10);
        } 

}