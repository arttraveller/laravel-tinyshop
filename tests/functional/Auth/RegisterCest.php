<?php

use App\User;
use Tests\functional\BaseFunctional;

class RegisterCest extends BaseFunctional
{

    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/register');
    }


    public function testAlreadyUsedEmail(FunctionalTester $I)
    {
        $user = $I->have(User::class, ['email' => 'john-doe@example.com']);
        $this->register($I, $user->name, $user->email, 'qwerty');
        $I->seeFormErrorMessages([
            'email' => 'The email has already been taken.',
        ]);
    }


    public function testSuccessReg(FunctionalTester $I)
    {
        $this->register($I, 'John Doe', 'john-doe@example.com', 'password');
        $I->seeRecord('users', ['name' => 'John Doe', 'email' => 'john-doe@example.com']);
        $I->seeAuthentication();
    }



    protected function register(FunctionalTester $I, $name, $email, $password): void
    {
        $I->fillField('name', $name);
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->fillField('password_confirmation', $password);
        $I->click('button[type=submit]');
    }

}
