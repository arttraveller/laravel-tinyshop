<?php

use App\Models\User;
use Tests\unit\BaseUnit;

class UserTest extends BaseUnit
{

    public function testRegister()
    {
        $newUser = User::register(
            $name = 'John Doe',
            $email = 'john-doe@example.com',
            $password = 'password'
        );

        expect('created correct object', $newUser)->isInstanceOf(User::class);

        $this->assertEquals($newUser->name, $name);
        $this->assertEquals($newUser->email, $email);
        $this->assertFalse($newUser->isAdmin());
        $this->assertFalse($newUser->hasVerifiedEmail());
    }

}