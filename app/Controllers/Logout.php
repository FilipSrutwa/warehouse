<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function getIndex()
    {
        return redirect()->to('/Login');
        session_destroy();
    }
}
