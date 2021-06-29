<?php


namespace App\Tests\functional;


class MovieCest
{
    public function trySearch(\FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see("Title");
        $I->see('Year');
        $I->see('Send');
        $I->fillField('Title', 'test');
        $I->fillField('form[Year]', 2021);
        $I->click('Send');
        $I->see("Crash Test World");
        $I->see("2021");
        $I->see("7.5");
    }

}