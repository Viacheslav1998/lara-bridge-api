.<?php

namespace App\Domain\Order\Entities;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'name',
        'price',
        'year',
        'type',
        'count',
        'deskription',
        'content',
        'assessment'
    ];

    /**
     * use Custom way factory
     */
    protected static function newFactory()
    {
        return OrderFactory::new();
    }

}
