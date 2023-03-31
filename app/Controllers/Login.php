<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function getIndex()
    {
        return view('login');
    }
    public function postIndex()
    {
        return redirect()->to(site_url() . '/MainMenu');
    }
}
