<?php

use Tests\functional\BaseFunctional;

class LoginCest extends BaseFunctional
{

    public function testCorrectCredentials(FunctionalTester $I)
    {
        $I->haveRecord('users', [
            'name' =>  'John Doe',
            'email' =>  'john@doe.com',
            'password' => bcrypt('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        $this->login($I, 'john@doe.com', 'password');
        $I->seeAuthentication();
    }

}
