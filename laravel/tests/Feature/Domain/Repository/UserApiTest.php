<?php

namespace Tests\Feature\Domain\Repository;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_a_user_can_be_created_via_api()
    {
        $userData = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'country' => $this->faker->country(),
            'phone' => $this->faker->phoneNumber(),
            'number' => $this->faker->numberBetween(1,100),
            'super' => $this->faker->boolean(),
            'email' => $this->faker->unique()->safeEmail(),
            'bio' => $this->faker->paragraph(nb_senteces=3),
        ];

        $response = $this->postJson('/api/users', $userData);


        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'User created successfully',
                     'user' => ['email' => $userData['email']],
                 ]);

        $this->assertDatabaseHas('users', [
            'email' => $userData['email'],
            'country' => 'USA',
        ]);
    }
}
