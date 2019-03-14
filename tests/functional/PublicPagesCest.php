<?php

use Tests\functional\BaseFunctional;

class PublicPagesCest extends BaseFunctional
{

    public function checkMainPage(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('Main page will be here');
    }

}