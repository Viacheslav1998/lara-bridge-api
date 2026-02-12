.<?php

namespace App\Domain\Catalog\Entities;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * use Custom way factory
     */
    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

}
