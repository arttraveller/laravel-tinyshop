<?php

use App\Models\User;
use Tests\functional\BaseFunctional;

class LoginPageCest extends BaseFunctional
{

    public function testWrongCredentials(FunctionalTester $I)
    {
        $this->login($I, 'admin', 'qwerty');
        $I->seeFormErrorMessages([
            'email' => 'These credentials do not match our records.',
        ]);
    }


    public function testCorrectCredentials(FunctionalTester $I)
    {
        $I->have(User::class, ['email' => 'john-doe@example.com']);
        $this->login($I, 'john-doe@example.com', 'password');
        $I->seeAuthentication();
    }

}
