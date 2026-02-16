<?php

namespace Database\Factories;

use App\Domain\Catalog\Entities\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * <\App\Domain\Catalog\Entities\Category>
 */
class CategoryFactory extends Factory
{
    protected $mode = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->word;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
