<?php

use App\Enums\EUserRoles;
use App\Models\User;
use Tests\functional\BaseFunctional;

class AdminOnlyPagesCest extends BaseFunctional
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


    public function checkAdminPageAsGuest(FunctionalTester $I)
    {
        $I->amOnPage('/admin');
        $I->seeCurrentUrlEquals('/login');
    }


    public function checkAdminPageAsVerifiedUser(FunctionalTester $I)
    {
        $this->user->markEmailAsVerified();

        $this->login($I, $this->user->email, 'password');
        $I->amOnPage('/admin');
        $I->seeResponseCodeIs(403);
    }


    public function checkAdminPageAsAdmin(FunctionalTester $I)
    {
        $this->user->markEmailAsVerified();
        $this->user->role_id = EUserRoles::ADMIN;
        $this->user->save();

        $this->login($I, $this->user->email, 'password');
        $I->amOnPage('/admin');
        $I->seeResponseCodeIs(200);
    }

}