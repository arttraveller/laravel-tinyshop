<?php

use App\Enums\EUserRoles;
use App\Models\User;
use Tests\functional\BaseFunctional;

class UsersOnlyPagesCest extends BaseFunctional
{

    private $user;


    public function _before(FunctionalTester $I)
    {
        $userAttributes = [
            'name' => 'John Doe',
            'email' => 'john-doe@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'role_id' => EUserRoles::USER,
        ];
        $this->user = $I->haveRecord(User::class, $userAttributes);
    }



    public function checkUoPageAsGuest(FunctionalTester $I)
    {
        $I->amOnPage('/home');
        $I->seeCurrentUrlEquals('/login');
    }


    public function checkUoPageAsUnverifiedUser(FunctionalTester $I)
    {
        $this->login($I, $this->user->email, 'password');
        $I->amOnPage('/home');
        $I->see('Verify Your Email Address');
    }



    public function checkUoPageAsVerifiedUser(FunctionalTester $I)
    {
        $this->user->markEmailAsVerified();

        $this->login($I, $this->user->email, 'password');
        $I->amOnPage('/home');
        $I->see('Main page will be here ');
    }

}