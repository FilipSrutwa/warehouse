<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ContractorModel;
use App\Models\ItemModel;
use App\Models\WarehouseItem;

class ManageItems extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundItems' => $this->grabItems(),
        ];
        return view('manageItems', $data);
    }
    public function getAddItem()
    {
        $data = [
            'foundContractors' => $this->grabContractors(),
            'foundCategories' => $this->grabCategories(),
        ];
        return view('addItem', $data);
    }
    public function getManageItem($itemID)
    {
        $data = [
            'foundItem' => $this->grabItem($itemID),
            'foundWarehouseData' => $this->grabWarehouseData($itemID),
        ];
        return view('manageItem', $data);
    }
    public function postAddItem()
    {
        $dataToSave = [
            'Name' => $_POST['name'],
            'EAN' => $_POST['ean'],
            'Contractor' => $_POST['contractor'],
            'Purchase_price' => $_POST['purchasePrice'],
            'Selling_price' => $_POST['sellingPrice'],
            'Category' => $_POST['category'],
        ];

        $itemModel = new ItemModel();
        $itemModel->save($dataToSave);

        return redirect()->to(site_url() . '/ManageItems');
    }
    public function getDropItem($itemID)
    {
        $itemModel = new ItemModel();
        $warehouseItemModel = new WarehouseItem();
        $itemModel->delete($itemID);
        $warehouseItemModel->where('Item_ID', $itemID)->delete();

        return redirect()->to(site_url() . '/ManageItems');
    }
    public function getEditItem($itemID)
    {
        $data = [
            'foundItem' => $this->grabItemModel($itemID),
            'foundContractors' => $this->grabContractors(),
            'foundCategories' => $this->grabCategories(),
        ];
        return view('editItem', $data);
    }

    public function postEditItem($itemID)
    {
        $dataToUpdate = [
            'Name' => $_POST['name'],
            'EAN' => $_POST['ean'],
            'Contractor' => $_POST['contractor'],
            'Purchase_price' => $_POST['purchasePrice'],
            'Selling_price' => $_POST['sellingPrice'],
            'Category' => $_POST['category'],
        ];
        $itemModel = new ItemModel();
        $itemModel->update($itemID, $dataToUpdate);
        return redirect()->to(site_url() . '/ManageItems/ManageItem/' . $itemID);
    }
    private function grabContractors()
    {
        $contractorModel = new ContractorModel();
        $foundContractors = $contractorModel->findAll();

        return $foundContractors;
    }
    private function grabCategories()
    {
        $categoryModel = new CategoryModel();
        $foundCategories = $categoryModel->findAll();

        return $foundCategories;
    }
    private function grabItems()
    {
        $itemModel = new ItemModel();
        $foundItems = $itemModel->findAll();

        return $foundItems;
    }
    private function grabMainMenuData()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT items_dictionary.ID AS ID, items_dictionary.Name AS Name, category.Name AS Category, warehouse_items.Amount AS Amount, warehouse_items.Updated_At AS LastDeliveryDate FROM warehouse_items INNER JOIN items_dictionary ON Item_ID = items_dictionary.ID INNER JOIN category ON items_dictionary.Category = category.ID  WHERE items_dictionary.Deleted_at IS NULL;");
        $results = $query->getResultArray();

        return $results;
    }
    private function grabItem($itemID)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT items_dictionary.ID AS ID, items_dictionary.Name AS Name,items_dictionary.Created_at AS CreatedAt, EAN, contractors.Name AS Contractor, Purchase_price AS PurchasePrice, Selling_price AS SellingPrice, category.Name As Category FROM items_dictionary INNER JOIN contractors ON Contractor = contractors.ID INNER JOIN category ON Category = category.ID WHERE items_dictionary.ID = $itemID;");
        $results = $query->getRowArray();

        return $results;
    }
    private function grabWarehouseData($itemID)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT warehouse_alleys.Name AS AlleyName, Amount, Updated_at AS UpdatedAt FROM warehouse_items INNER JOIN warehouse_alleys ON Alley_ID = warehouse_alleys.ID WHERE Item_ID = $itemID;");
        $results = $query->getRowArray();

        return $results;
    }
    private function grabItemModel($itemID)
    {
        $itemModel = new ItemModel();
        $foundItem = $itemModel->find($itemID);

        return $foundItem;
    }
}
