<?php 

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * UserRepository
 */
class UserRepository
{
        // Eloquent

        /**
        * all users
        */
        public function getAll()
        {
            return User::all();
        } 

        /**
         * get current/id user
         */
        public function find($id)
        {
            return User::findOrFail($id);
        }



        // Query-Builder  
        

        /**
         * all data / paginate
         */
        public function all() 
        {
            return User::query()->paginate(10);
        } 

}