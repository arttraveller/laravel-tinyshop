<?php

namespace Tests\functional;

use FunctionalTester;

abstract class BaseFunctional
{

    protected function login(FunctionalTester $I, $login, $password): void
    {
        $I->amOnPage('/login');
        $I->fillField('email', $login);
        $I->fillField('password', $password);
        $I->click('button[type=submit]');
    }

}
