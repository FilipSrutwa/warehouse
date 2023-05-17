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

        $foundLogin = $this->checkLogin($login, $password);

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

    private function checkLogin($login, $pPassword)
    {
        $model = new AccountModel();
        $user = $model->where('Login', $login)->first();
        $passwordFromDB = $user['Password'];
        if (password_verify($pPassword, $passwordFromDB))
            return $user;
        else return null;
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
