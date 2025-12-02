<?php

namespace tests\Unit\Domain\Repository;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Mockery;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    private UserRepository $repo;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repo = new UserRepository();
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }


    #[Test]
    public function it_calls_all_on_user_model(): void
    {
        $userMock = Mockery::mock('alias:' . User::class);

        $collection = new Collection();

        $userMock->shouldReceive('all')
            ->once()
            ->andReturn($collection);

        $this->assertSame($collection, $this->repo->getUsers());
    }

    #[Test]
    public function if_finds_user_by_id(): void
    {
        // cnfg Alias mocking for calling User::find()
        $mock = Mockery::mock('alias:' . User::class);
        $expectedUser = new User([
            'id' => 1,
            'name' => 'John'
        ]);

        // cnfg waiting
        $mock->shouldReceive('find')
            ->with(1)
            ->once()
            ->andReturn($expectedUser);

        // run test, run method repo[repository]
        $actualUser = $this->repo->find(1);

        // approval
        $this->assertSame($expectedUser, $actualUser);
    }

}
