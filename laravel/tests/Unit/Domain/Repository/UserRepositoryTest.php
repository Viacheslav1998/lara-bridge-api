<?php

namespace Tests\Unit\Domain\Repository;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private UserRepository $repo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repo = new UserRepository();
    }

    #[Test]
    public function it_finds_user_by_id(): void
    {
        $user = User::factory()->create();

        $actualUser = $this->repo->find($user->id);

        $this->assertNotNull($actualUser);
        $this->assertEquals($user->id, $actualUser->id);
    }

    #[Test]
    public function it_throws_exception_if_user_not_found(): void
    {
        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);

        $this->repo->findById(999);
    }

    #[Test]
    public function it_counts_users(): void
    {
        User::factory()->count(3)->create();

        $this->assertSame(3, $this->repo->count());
    }
}
