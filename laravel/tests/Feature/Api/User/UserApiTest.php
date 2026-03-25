<?php

namespace Tests\Feature\Api\User;

use App\Domain\User\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    #[Test]
    public function it_user_can_be_created_via_api()
    {
        $userData = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'country' => $this->faker->country(),
            'phone' => $this->faker->numerify(),
            'number' => $this->faker->numberBetween(1, 100),
            'super' => $this->faker->boolean(),
            'email' => $this->faker->unique()->safeEmail(),
            'bio' => $this->faker->paragraphs(3, true)
        ];

        $response = $this->postJson('api/users', $userData);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'User created successfully',
                     'data' => ['email' => $userData['email']],
                 ]);

        $this->assertDatabaseHas('users', [
            'email' => $userData['email']
        ]);
    }

    #[Test]
    public function it_returns_a_single_user_via_api()
    {
        $user = User::factory()->create();

        $response = $this->getJson('/api/users/' . $user->id);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'email' => $user->email,
                    'first_name' => $user->first_name
                ],
            ]);
    }

    #[Test]
    public function it_can_be_updated_via_api()
    {
        $user = User::factory()->create();

        $newData = [
           'first_name' => 'UpdateName',
            'last_name' => 'UpdLName',
            'country' => 'Karaganda',
            'phone' => '678',
            'number' => '9292',
            'super' => 'id-asd',
            'email' => 'nickik@gmail.com',
            'bio' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste sequi quaerat laudantium voluptates accusantium dolor fuga quibusdam nemo et! Esse fugiat dicta hic nemo dolor ipsum, alias reprehenderit in nostrum?'
        ];

        $response = $this->putJson('/api/users/' . $user->id, $newData);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'first_name' => 'UpdateName',
                    'last_name' => 'UpdLName',
                    'country' => 'Karaganda',
                    'phone' => '678',
                    'number' => '9292',
                    'super' => 'id-asd',
                    'email' => 'nickik@gmail.com',
                    'bio' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste sequi quaerat laudantium voluptates accusantium dolor fuga quibusdam nemo et! Esse fugiat dicta hic nemo dolor ipsum, alias reprehenderit in nostrum?'
                ],
            ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'first_name' => 'UpdateName',
            'country' => 'Karaganda',
        ]);
    }

    #[Test]
    public function it_a_user_can_be_deleted_via_api()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson('/api/users/' . $user->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    #[Test]
    public function it_users_can_be_retrieved_with_pagination_via_api()
    {
        User::factory()->count(30)->create();
        $perPage = 10;

        $response = $this->getJson('/api/users?page=1&per_page=' . $perPage);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'data' => ['*' => ['id', 'email']],
                    'meta' => [
                        'current_page',
                        'last_page',
                        'total',
                    ],
                    'links' => ['first', 'last', 'prev', 'next']
                ],
            ])

            ->assertJsonCount($perPage, 'data.data')

            ->assertJsonPath('data.meta.total', 30);
    }

}
