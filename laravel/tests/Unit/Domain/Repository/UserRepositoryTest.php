<?php

namespace tests\Unit\Domain\Repository;


use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Mockery;



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


}