<?php

use App\Enums\EUserRoles;
use App\Models\User;
use Tests\functional\BaseFunctional;

class UsersOnlyPagesCest extends BaseFunctional
{

    protected $userAttributes;


    public function _before(FunctionalTester $I)
    {
        $this->userAttributes = [
            'name' => 'John Doe',
            'email' => 'john-doe@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'role_id' => EUserRoles::USER,
        ];
        $I->haveRecord(User::class, $this->userAttributes);
    }


    public function checkHomePage(FunctionalTester $I)
    {
        $this->checkPage($I, '/home');
    }


    protected function checkPage(FunctionalTester $I, $url)
    {
        // Check as not logged user
        $I->amOnPage($url);
        $I->seeCurrentUrlEquals('/login');

        // Check as unverified user
        $this->login($I, $this->userAttributes['email'], 'password');
        $I->see('Verify Your Email Address');
    }

}