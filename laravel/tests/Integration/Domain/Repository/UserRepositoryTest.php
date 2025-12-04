<?php

namespace tests\Integration\Domain\Repository;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user()
    {
        $repo = new UserRepository();

        $user = $repo->create([
            'first_name' => 'Jogn',
            'email' => 'Jogn@gmail.com'
        ]); 

        $this->assertDatabaseHas('users', [
            'email' => 'Jogn@gmail.com'            
        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('jogn@gmail.com', $user->email);
    }
}