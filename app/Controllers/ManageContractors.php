<?php

namespace App\Controllers;

class ManageContractors extends BaseController
{
    public function getIndex()
    {
        return view('manageContractors');
    }
    public function getAddContractor()
    {
        return view('addContractor');
    }
}
