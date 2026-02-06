<?php

namespace Database\Factories;

use App\Domain\Catalog\Entities\Product;
use App\Domain\Catalog\Entities\ProductSku;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domain\Catalog\Entities\ProductSku>
 */
class ProductSkuFactory extends Factory
{
    protected $model = ProductSku::class;

    /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'color' => $this->faker->safeColorName(),
            'stock_count' => $this->faker->numberBetween(0, 100),
            'size' => $this->faker->randomElement([36, 36.5, 37, 38, 39, 40, 41, 42, 43, 44, 45]),
            'price' => $this->faker->randomFload(2, 500, 10000),
        ];
    }
}
