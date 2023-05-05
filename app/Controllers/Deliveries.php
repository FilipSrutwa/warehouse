<?php

namespace App\Controllers;

use App\Models\ContractorModel;
use App\Models\IssuanceModel;
use App\Models\DeliveryModel;
use App\Models\ItemModel;
use App\Models\WarehouseItem;

class Deliveries extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundDeliveries' => $this->grabDeliveries(),
            'foundIssuances' => $this->grabIssuances(),
        ];

        return view('deliveries', $data);
    }
    public function getAddGoodsIssue()
    {
        $data = [
            'foundItems' => $this->grabItems(),
        ];
        return view('addGoodsIssue', $data);
    }
    public function getAddGoodsDelivery()
    {
        $data = [
            'foundItems' => $this->grabItemsWithContractors(),
        ];
        return view('addGoodsDelivery', $data);
    }
    public function postAddGoodsDelivery()
    {
        $dataToSave = [
            'Item' => $_POST['item'],
            'Amount' => $_POST['amount'],
        ];

        $deliveryModel = new DeliveryModel();
        $deliveryModel->insert($dataToSave);
        $deliveryID = $deliveryModel->getInsertID();

        $dataForWarehouseModel = [
            'Item_ID' => $_POST['item'],
            'Alley_ID' => 1,
            'Amount' => $_POST['amount'],
            'Delivery_ID' => $deliveryID,
        ];
        $warehouseItemModel = new WarehouseItem();
        $warehouseItemModel->save($dataForWarehouseModel);

        return redirect()->to(site_url() . '/Deliveries');
    }
    public function getEditDelivery($deliveryID)
    {
        $data = [
            'foundDelivery' => $this->grabDelivery($deliveryID),
            'foundItems' => $this->grabItemsWithContractors(),
        ];

        return view('editDelivery', $data);
    }

    public function getDropDelivery($deliveryID)
    {
        $deliveryModel = new DeliveryModel();
        $foundDelivery = $deliveryModel->find($deliveryID);

        $warehouseItemModel = new WarehouseItem();
        $warehouseItemModel->where('Delivery_ID', $deliveryID)->where('Item_ID', $foundDelivery['Item'])->delete();
        $deliveryModel->delete($deliveryID);

        return redirect()->to(site_url() . '/Deliveries');
    }
    public function postEditDelivery($deliveryID)
    {
        $dataToUpdateInDeliveryModel = [
            'Item' => $_POST['item'],
            'Amount' => $_POST['amount'],
        ];

        $warehouseItemModel = new WarehouseItem();
        $warehouseItemID = $warehouseItemModel->where('Delivery_ID', $deliveryID)->first();
        $warehouseItemID = $warehouseItemID['ID'];
        $dataToUpdateInWarehouseItem = [
            'Item_ID' => $_POST['item'],
            'Amount' => $_POST['amount'],
        ];

        $deliveryModel = new DeliveryModel();
        $deliveryModel->update($deliveryID, $dataToUpdateInDeliveryModel);
        $warehouseItemModel->update($warehouseItemID, $dataToUpdateInWarehouseItem);

        return redirect()->to(site_url() . '/Deliveries');
    }
    private function grabIssuances()
    {
        $issuanceModel = new IssuanceModel();

        return $issuanceModel->findAll();
    }
    private function grabDeliveries()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT deliveries.ID AS ID, deliveries.Amount AS Amount, deliveries.Created_at AS Created_at, items_dictionary.Name AS Name FROM deliveries INNER JOIN items_dictionary ON Item = items_dictionary.ID WHERE deliveries.Deleted_at IS NULL;");
        $results = $query->getResultArray();

        return $results;
    }
    private function grabItems()
    {
        $itemModel = new ItemModel();

        return $itemModel->findAll();
    }
    private function grabContractors()
    {
        $contractorModel = new ContractorModel();

        return $contractorModel->findAll();
    }
    private function grabItemsWithContractors()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT items_dictionary.ID AS ID, items_dictionary.Name AS Name, EAN, contractors.Name AS Contractor FROM items_dictionary INNER JOIN contractors ON Contractor = contractors.ID;");
        $results = $query->getResultArray();

        return $results;
    }
    private function grabDelivery($deliveryID)
    {
        $deliveryModel = new DeliveryModel();

        return $deliveryModel->find($deliveryID);
    }
}
