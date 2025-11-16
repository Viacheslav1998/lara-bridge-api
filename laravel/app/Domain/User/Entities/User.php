<?php

namespace App\Domain\User\Entities;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'phone',
        'number',
        'super',
        'email',
        'bio'
    ];

    /**
     * use Custom way factory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }

}
