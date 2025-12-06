<?php

namespace Tests\Integration\Domain\Repository;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepository;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserRepositoryIntegrationTest extends TestCase
{
    protected UserRepository $repo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repo = new UserRepository();
    }

    public function test_can_create_a_user_without_touching_existing_data()
    {
        $uniqueEmail = 'test+' . Str::random(8) . '@example.com';

        $data = [
            'first_name' => 'Integration',
            'last_name' => 'Test',
            'country' => 'Testland',
            'phone' => '+999999999',
            'number' => '999',
            'super' => false,
            'email' => $uniqueEmail,
            'bio' => 'Integration test user'
        ];

        $user = $this->repo->create($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($uniqueEmail, $user->email);

        $user->delete();
    }
}
