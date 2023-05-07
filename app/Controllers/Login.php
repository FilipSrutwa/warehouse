<?php

namespace App\Controllers;

use App\Models\AccountModel;

use function PHPUnit\Framework\isEmpty;

class Login extends BaseController
{
    public function getIndex()
    {
        return view('login');
    }
    public function postIndex()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $accModel = new AccountModel();
        $foundLogin = $accModel->where('Login', $login)->where('Password', $password)->first();

        if ($foundLogin == null)
            return redirect()->to(site_url());
        else {
            if (session_status() == PHP_SESSION_NONE)
                session_start();
            $_SESSION['accType'] = $foundLogin['Acc_type'];
            $_SESSION['empID'] = $foundLogin['ID'];
            return redirect()->to(site_url() . '/MainMenu');
        }
    }
}
