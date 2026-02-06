<?php

namespace Database\Factories;

use App\Domain\User\Entities\User;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * old way @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 *new wat <\App\Domain\User\Entities\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'country' => Str::random(10) . '_country',
            'phone' => fake()->numerify(),
            'super' => fake()->lexify('id-????'),
            'number' => fake()->unique()->numerify('####'),
            'bio' => fake()->text()
        ];
    }
}
