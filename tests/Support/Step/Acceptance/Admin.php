<?php

declare(strict_types=1);

namespace Tests\Support\Step\Acceptance;
use Tests\Support\Page\Acceptance\Login;
class Admin extends \Tests\Support\AcceptanceTester
{

    public function login($email, $password)
    {
        
        $I = $this;
        $I->amOnPage(Login::$URL);
        $I->fillField(Login:: $emailaddressField, $email);
        $I->fillField(Login::$passwordField, $password);
        $I->click(Login::$checkbox);
        $I->click(Login::$loginButton);
    }

    public function loginWithoutCheckbox($email, $password)
    {
        
        $I = $this;
        $I->amOnPage(Login::$URL);
        $I->fillField(Login:: $emailaddressField, $email);
        $I->fillField(Login::$passwordField, $password);
        $I->click(Login::$loginButton);
    }

    public function forgotPassword()
    {
        $I = $this;
        $I->amOnPage(Login::$URL);
        $I->click(Login::$linkforgotpassword);
    }

}
