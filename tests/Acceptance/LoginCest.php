<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Tests\Support\Step\Acceptance\Admin;

class SigninCest
{
    // Hàm kiểm thử đăng nhập đúng email, password
    public function loginSuccessfully(Admin $I)
    {
        $I->login('hangtt@gmail.com', '123456789');
        $I->seeInCurrentUrl('/home');
    }

    // Hàm kiểm thử đăng nhập đúng email nhưng không click checkbox
    public function loginSuccessfullyWithoutCheck(Admin $I)
    {
        $I->loginWithoutCheckbox('hangtt@gmail.com', '123456789');
        $I->seeInCurrentUrl('/home');
    }

    // Hàm kiểm thử đúng email, sai password:
    public function wrongPassword(Admin $I)
    {
        $I->login('hangtt@gmail.com', '23456789');
         $I->seeInCurrentUrl('/home');
        // $I->see('These credentials do not match our records.');
    }

    // Hàm kiểm thử sai email, đúng password:
    public function wrongEmail(Admin $I)
    {
        $I->login('thangtt@gmail.com', '123456789');
        $I->seeInCurrentUrl('/home');
        // $I->see('These credentials do not match our records.');
    }
    //Hàm bỏ trống email, password, uncheck :
    public function BlankEmailPassword(Admin $I)
    {
        $I->loginWithoutCheckbox('', '');
        $I->seeInCurrentUrl('/home');
        // $I->see('The email field is required.');
    }
    // Hàm bỏ trống email:
    public function BlankEmail(Admin $I)
    {
        $I->login('', '123456789');
        $I->seeInCurrentUrl('/home');
        // $I->see('The email field is required.');
    }
     // Hàm bỏ trống password:
     public function BlankPassword(Admin $I)
     {
         $I->login('thangtt@gmail.com', '');
         $I->seeInCurrentUrl('/home');
        //  $I->see('The password field is required.');
     }

    //Hàm forgotPassword:
    Public function forgotPassword(Admin $I)
    {
        $I->forgotPassword();
        $I->see('Reset Password');
    }

}
