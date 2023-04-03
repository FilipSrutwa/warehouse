<?php

namespace App\Controllers;

class SalesHistory extends BaseController
{
    public function getIndex()
    {
        return view('salesHistory');
    }
    public function getAddSale()
    {
        return view('addSale');
    }
}
