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
    public function getAccount($accID)
    {
        $data = [
            'foundAccount' => $this->grabAccount($accID),
            'foundAccType' => $this->grabAccType($accID),
        ];

        return view('account', $data);
    }
    public function getEditAccount($accID)
    {
        $data = [
            'foundAccount' => $this->grabAccount($accID),
            'foundAccTypes' => $this->grabAccountTypes(),
        ];

        return view('editAccount', $data);
    }
    public function getDropAccount($accID)
    {
        $account = new AccountModel();
        $account->delete($accID);

        return redirect()->to(site_url() . '/ManageAccounts');
    }


    public function postEditAccount($accID)
    {
        $dataToSave = [
            'Login' => $_POST['login'],
            'Password' => $this->hash_password($_POST['password']),
            'Name' => $_POST['name'],
            'Surname' => $_POST['surname'],
            'Acc_type' => $_POST['accType'],
        ];

        $accModel = new AccountModel();
        $accModel->update($accID, $dataToSave);

        return redirect()->to(site_url() . '/ManageAccounts/Account/' . $accID);
    }
    public function postAddEmployee()
    {
        $dataToSave = [
            'Login' => $_POST['login'],
            'Password' => $this->hash_password($_POST['password']),
            'Name' => $_POST['name'],
            'Surname' => $_POST['surname'],
            'Acc_type' => $_POST['accType'],
        ];
        $accModel = new AccountModel();
        $accModel->save($dataToSave);

        return redirect()->to(site_url() . '/ManageAccounts');
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
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
    private function grabAccount($accID)
    {
        $account = new AccountModel();
        $foundAccount = $account->find($accID);

        return $foundAccount;
    }
    private function grabAccType($accID)
    {
        $account = new AccountModel();
        $foundAcc = $account->find($accID);
        $accType = new AccountTypeModel();
        $foundAccType = $accType->where('ID', $foundAcc['Acc_type'])->first();

        return $foundAccType;
    }
}
