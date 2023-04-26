<?php

namespace App\Controllers;

use App\Models\ContractorModel;

class ManageContractors extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundContractors' => $this->grabContractors(),
        ];
        return view('manageContractors', $data);
    }
    public function getAddContractor()
    {
        return view('addContractor');
    }
    public function getContractor($contractorID)
    {
        $data = [
            'foundContractor' => $this->grabContractor($contractorID),
        ];

        return view('manageContractor', $data);
    }
    public function postAddContractor()
    {
        $contractorModel = new ContractorModel();
        $dataToSave = [
            'Name' => $_POST['name'],
            'NIP' => $_POST['nip'],
            'Bank_account' => $_POST['accNumber'],
        ];
        $contractorModel->save($dataToSave);

        return redirect()->to(site_url() . '/ManageContractors');
    }
    public function getEditContractor($contractorID)
    {
        $data = [
            'foundContractor' => $this->grabContractor($contractorID),
        ];
        return view('editContractor', $data);
    }
    public function getDropContractor($contractorID)
    {
        $contractorModel = new ContractorModel();
        $contractorModel->delete($contractorID);

        return redirect()->to(site_url() . '/ManageContractors');
    }
    public function postEditContractor($contractorID)
    {
        $dataToSave = [
            'Name' => $_POST['name'],
            'NIP' => $_POST['nip'],
            'Bank_account' => $_POST['accNumber'],
        ];
        $contractorModel = new ContractorModel();
        $contractorModel->update($contractorID, $dataToSave);
        return redirect()->to(site_url() . '/ManageContractors/Contractor/' . $contractorID);
    }
    private function grabContractors()
    {
        $contractorModel = new ContractorModel();
        $foundContractors = $contractorModel->findAll();

        return $foundContractors;
    }

    private function grabContractor($contractorID)
    {
        $contractorModel = new ContractorModel();
        $foundContractor = $contractorModel->find($contractorID);

        return $foundContractor;
    }
}
