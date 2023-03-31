<?php

namespace App\Controllers;

class MainMenu extends BaseController
{
    public function getIndex()
    {
        return view('mainMenu');
    }
}
