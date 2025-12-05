<?php

namespace Tests\Feature\Domain\Repository;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Domain\User\Entities\User;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase; 
    use WithFaker;

    public function test_a_user_can_be_created_via_api()
    {
        $userData = [
            'first_name' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',
            'country' => 'USA'
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
