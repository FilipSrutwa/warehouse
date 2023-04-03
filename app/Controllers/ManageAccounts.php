<?php

namespace App\Controllers;

class ManageAccounts extends BaseController
{
    public function getIndex()
    {
        return view('manageAccounts');
    }
    public function getAddEmployee()
    {
        return view('addEmployee');
    }
}
