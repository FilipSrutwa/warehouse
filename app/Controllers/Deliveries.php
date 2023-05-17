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
            'foundItems' => $this->grabMerchandise(),
        ];
        return view('addGoodsIssue', $data);
    }
    public function postAddGoodsIssue()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        $dataToInsert = [
            'Item' => $_POST['warehouseItemID'],
            'Amount' => $_POST['Amount'],
            'Created_by' => $_SESSION['empID'],
        ];

        //aktualizacja stanu magazynowego
        $warehouseItemModel = new WarehouseItem();
        $foundWarehouseItem = $warehouseItemModel->find($_POST['warehouseItemID']);
        $amount = $foundWarehouseItem['Amount'];
        $amount -= $_POST['Amount'];
        $dataToUpdate = ['Amount' => $amount];
        $warehouseItemModel->update($_POST['warehouseItemID'], $dataToUpdate);

        $issuanceModel = new IssuanceModel();
        $issuanceModel->insert($dataToInsert);
        return redirect()->to(site_url() . '/Deliveries');
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

    public function getEditIssuance($issuanceID)
    {
        $data = [
            'foundItem' => $this->grabWarehouseItem($issuanceID),
            'foundIssuance' => $this->grabIssuance($issuanceID),
        ];
        return view('editIssuance', $data);
    }
    public function postEditIssuance($issuanceID)
    {
        $issuanceModel = new IssuanceModel();
        $foundIssuance = $issuanceModel->find($issuanceID);
        $warehouseItemModel = new WarehouseItem();
        $foundWarehouseItem = $warehouseItemModel->find($foundIssuance['Item']);

        $amount = $foundWarehouseItem['Amount'];
        $amount += $foundIssuance['Amount'];
        $amount -= $_POST['Amount'];

        $dataToUpdateForWarehouseItem = ['Amount' => $amount];
        $warehouseItemModel->update($foundIssuance['Item'], $dataToUpdateForWarehouseItem);

        $dataToUpdateIssuance = ['Amount' => $_POST['Amount']];
        $issuanceModel->update($issuanceID, $dataToUpdateIssuance);

        return redirect()->to(site_url() . '/Deliveries');
    }
    public function getDropIssuance($issuanceID)
    {
        $issuanceModel = new IssuanceModel();
        $foundIssuance = $issuanceModel->find($issuanceID);

        //aktualizacja stanu magazynowego
        $warehouseItemModel = new WarehouseItem();
        $foundWarehouseItem = $warehouseItemModel->find($foundIssuance['Item']);
        $amount = $foundWarehouseItem['Amount'];
        $amount += $foundIssuance['Amount'];
        $dataToUpdate = ['Amount' => $amount];
        $warehouseItemModel->update($foundIssuance['Item'], $dataToUpdate);

        $issuanceModel->delete($issuanceID);
        return redirect()->to(site_url() . '/Deliveries');
    }

    private function grabIssuances()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT issuances.ID AS ID, items_dictionary.Name AS Name, issuances.Amount AS Amount, issuances.Created_at AS Created_at FROM issuances INNER JOIN warehouse_items ON warehouse_items.ID = issuances.Item INNER JOIN items_dictionary ON warehouse_items.Item_ID = items_dictionary.ID WHERE issuances.Deleted_at IS NULL;;");
        $results = $query->getResultArray();

        return $results;
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
    private function grabWarehouseItem($issuanceID)
    {
        $issuanceModel = new IssuanceModel();
        $foundIssuance = $issuanceModel->find($issuanceID);
        $warehouseItemModel = new WarehouseItem();

        return $warehouseItemModel->find($foundIssuance['Item']);
    }
    private function grabIssuance($issuanceID)
    {
        $issuanceModel = new IssuanceModel();
        $foundIssuance = $issuanceModel->find($issuanceID);
        return $foundIssuance;
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
    private function grabMerchandise()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT warehouse_items.ID AS ID, items_dictionary.Name AS Name, warehouse_alleys.Name AS Alley, warehouse_items.Amount AS Amount, items_dictionary.Selling_price AS Price 
        FROM warehouse_items INNER JOIN warehouse_alleys ON Alley_ID = warehouse_alleys.ID 
        INNER JOIN items_dictionary ON Item_ID = items_dictionary.ID 
        WHERE warehouse_items.Deleted_at IS NULL AND warehouse_items.Amount > 0
        ORDER BY items_dictionary.Name
        ;
        ");
        $results = $query->getResultArray();

        return $results;
    }
}
