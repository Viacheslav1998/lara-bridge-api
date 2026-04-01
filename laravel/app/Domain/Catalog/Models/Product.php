.<?php

namespace App\Domain\Catalog\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'category_id',
        'name',
        'type',
        'price',
        'count',
        'country_origin',
        'year',
        'description',
        'content',
        'assessment',
    ];


    /**
     * use Custom way factory
     */
    protected static function newFactory()
    {
        return ProductFactory::new();
    }

}
