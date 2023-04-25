<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\AccountTypeModel;

class ManageAccounts extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundAccounts' => $this->grabAccounts(),
        ];
        return view('manageAccounts', $data);
    }
    public function getAddEmployee()
    {
        $data = [
            'foundAccTypes' => $this->grabAccountTypes(),
        ];
        return view('addEmployee', $data);
    }
    public function postAddEmployee()
    {
        $dataToSave = [
            'Login' => $_POST['login'],
            'Password' => $_POST['password'],
            'Name' => $_POST['name'],
            'Surname' => $_POST['surname'],
            'Acc_type' => $_POST['accType'],
        ];
        $accModel = new AccountModel();
        $accModel->save($dataToSave);

        return redirect()->to(site_url() . '/ManageAccounts');
    }

    private function grabAccounts()
    {
        $account = new AccountModel();
        $foundAccounts = $account->findAll();

        return $foundAccounts;
    }
    private function grabAccountTypes()
    {
        $accType = new AccountTypeModel();
        $foundAccTypes = $accType->findAll();

        return $foundAccTypes;
    }
}
