<?php

namespace App\Controllers;

use App\Models\BuyerModel;
use App\Models\ItemModel;
use App\Models\SaleModel;
use App\Models\WarehouseItem;

class Sales extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundSales' => $this->grabSalesData(),
        ];
        return view('sales', $data);
    }
    public function getAddSale()
    {
        $data = [
            'foundBuyers' => $this->grabBuyers(),
            'foundItems' => $this->grabMerchandise(),
        ];
        return view('addSale', $data);
    }
    public function postAddSale()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        $date = date("d-m-Y h:i:s");

        $warehouseItem = new WarehouseItem();

        foreach ($_POST['warehouseItemID'] as $key => $value) {
            print("WarehouseItemID: " . $value . ' ');
            print($_POST['amount'][$key] . ' ');
        }
        foreach ($_POST['warehouseItemID'] as $key => $value) {
            $foundWarehouseItem = $warehouseItem->find($value);
            $itemModel = new ItemModel();
            $foundItem = $itemModel->find($foundWarehouseItem['Item_ID']);
            $price = $foundItem['Selling_price'];
            $newAmountInMagazine = $foundWarehouseItem['Amount'] - $_POST['amount'][$key];
            $dataToUpdateWarehouseItem = ['Amount' => $newAmountInMagazine];
            $warehouseItem->update($value, $dataToUpdateWarehouseItem);

            $itemID = $foundWarehouseItem['Item_ID'];
            $dataForSaleModel = [
                'Item_ID' => $itemID,
                'Amount' => $_POST['amount'][$key],
                'Sell_price' => $price * $_POST['amount'][$key],
                'Buyer_ID' => $_POST['buyer'],
                'Employee_ID' => $_SESSION['empID'],
                'Bag_ID' => $_SESSION['empID'] . '-' . $date,
            ];
            $saleModel = new SaleModel();
            $saleModel->insert($dataForSaleModel);
        }

        return redirect()->to(site_url() . '/Sales');
    }
    private function grabSalesData()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT sales.ID AS ID, items_dictionary.Name AS Name, sales.Amount AS Amount, sales.Sell_price AS Sell_price, buyers.Name AS Buyer, accounts.Name AS EmployeeName, accounts.Surname AS EmployeeSurname, Bag_ID, sales.Created_at AS Created_at 
        FROM sales LEFT JOIN buyers ON sales.Buyer_ID = buyers.ID 
        INNER JOIN accounts ON sales.Employee_ID = accounts.ID INNER JOIN items_dictionary ON sales.Item_ID = items_dictionary.ID
        WHERE sales.Deleted_at IS NULL;
        ");
        $results = $query->getResultArray();

        return $results;
    }

    private function grabBuyers()
    {
        $buyer = new BuyerModel();

        return $buyer->findAll();
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
