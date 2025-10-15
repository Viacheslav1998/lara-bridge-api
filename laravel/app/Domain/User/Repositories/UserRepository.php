<?php 

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;

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
        public function all(array $filters = [])
        {
            $query = User::query();

            if (!empty($filters['country'])) {
                $query->where('country', $filters['country']);
            }

            if (!empty($filters['active'])) {
                $query->where('active', $filters['active']);
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