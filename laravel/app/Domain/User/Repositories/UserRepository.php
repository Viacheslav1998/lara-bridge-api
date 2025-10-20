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

        public function all() {
            return User::all();
        }

        public function findByCountry(string $country)
        {
            return User::where('country', $country)->get();
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