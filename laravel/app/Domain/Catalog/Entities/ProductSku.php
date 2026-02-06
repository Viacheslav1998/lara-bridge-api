.<?php

namespace App\Domain\Catalog\Entities;

use Database\Factories\ProductSkuFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_skus';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
       'product_id',
       'color',
       'stock_count',
       'size',
       'price'
    ];


    /**
     * use Custom way factory
     */
    protected static function newFactory()
    {
        return ProductSkuFactory::new();
    }

}
