<?php

namespace Tests\Unit\Domain;

use App\Domains\Users\Entities\User;
use Tests\TestCase;

class UserEntitiesTest extends TestCase
{
    public function test_users_name_is_correct()
    {
        $user = new User("Иван", "ivanExample@example.com");

        $this->assertEquals("Иван", $user->getName());
    }
}