<?php

namespace App\Controllers;

use App\Models\BuyerModel;
use App\Models\OrderItemsModel;
use App\Models\OrderModel;
use App\Models\WarehouseItem;

use function PHPUnit\Framework\isEmpty;

class Orders extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundOrders' => $this->grabOrders(),
        ];
        return view('orders', $data);
    }
    public function getOrder($orderID)
    {
        $data = [
            'foundOrderData' => $this->grabOrderData($orderID),
            'orderID' => $orderID,
            'totalPrice' => $this->grabTotalPrice($orderID),
            'buyer' => $this->grabOrdersBuyer($orderID),
            'collectionDate' => $this->grabOrderCollectionDate($orderID),
        ];
        return view('order', $data);
    }
    public function getAddOrder()
    {
        $data = [
            'foundBuyers' => $this->grabBuyers(),
        ];
        return view('addOrder', $data);
    }
    public function postAddOrder()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        $dataToSave = [
            'Buyer_ID' => $_POST['buyer'],
            'Collection_date' => $_POST['collectionDate'],
            'Employee_ID' => $_SESSION['empID'],
        ];
        $orderModel = new OrderModel();
        $orderModel->insert($dataToSave);

        return redirect()->to(site_url() . '/Orders/Order/' . $orderModel->getInsertID());
    }
    public function getAddToOrder($orderID)
    {
        $data = [
            'foundItems' => $this->grabMerchandise(),
            'foundBuyer' => $this->grabOrdersBuyer($orderID),
        ];
        return view('addToOrder', $data);
    }
    public function postAddToOrder($orderID)
    {
        //aktualizacja stanu magazynowego w zadanym ID
        $warehouseItem = new WarehouseItem();
        $foundWarehouseItem = $warehouseItem->find($_POST['warehouseItemID']);
        $newAmountInMagazine = $foundWarehouseItem['Amount'] - $_POST['amount'];
        $dataToUpdateWarehouseItem = ['Amount' => $newAmountInMagazine];
        $warehouseItem->update($_POST['warehouseItemID'], $dataToUpdateWarehouseItem);

        $dataToInsert = [
            'Order_ID' => $orderID,
            'Warehouse_item_ID' => $_POST['warehouseItemID'],
            'Amount' => $_POST['amount'],
            'Sell_price' => $_POST['amount'] * $_POST['price'],
        ];
        $orderItemsModel = new OrderItemsModel();
        $orderItemsModel->insert($dataToInsert);

        return redirect()->to(site_url() . '/Orders/Order/' . $orderID);
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
    private function grabOrders()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT orders.ID AS ID, buyers.Name AS Buyer, accounts.Name AS Name, accounts.Surname AS Surname, Collection_date, orders.Created_at AS Created_at 
        FROM orders INNER JOIN buyers ON orders.Buyer_ID = buyers.ID 
        INNER JOIN accounts ON orders.Employee_ID = accounts.ID 
        WHERE orders.Deleted_at IS NULL 
        ORDER BY Collection_date ASC;
        ");
        $results = $query->getResultArray();

        return $results;
    }
    private function grabOrderData($orderID)
    {
        $db = \Config\Database::connect();
        $query = $db->query(
            "SELECT order_items.ID AS ID, order_items.Warehouse_item_ID AS Warehouse_item_ID, order_items.Amount AS Amount, order_items.Sell_price AS Price, items_dictionary.Name AS Item_name, buyers.Name AS Buyer,orders.Collection_date AS Collection_date
        FROM order_items INNER JOIN warehouse_items ON order_items.Warehouse_item_ID = warehouse_items.ID 
        INNER JOIN items_dictionary ON warehouse_items.Item_ID = items_dictionary.ID
        INNER JOIN orders ON order_items.Order_ID = orders.ID 
        INNER JOIN buyers ON orders.Buyer_ID = buyers.ID
        WHERE order_items.Order_ID = " . $orderID
        );
        $results = $query->getResultArray();

        return $results;
    }
    private function grabOrderCollectionDate($orderID)
    {
        $orderModel = new OrderModel();
        $foundOrder = $orderModel->find($orderID);

        return $foundOrder['Collection_date'];
    }
    private function grabTotalPrice($orderID)
    {
        $orderItemsModel = new OrderItemsModel();
        $foundItems = $orderItemsModel->where('Order_ID', $orderID)->findAll();

        $price = 0.00;
        foreach ($foundItems as $item) {
            $price += $item['Sell_price'];
        }

        return number_format((float)$price, 2, '.', '');
    }
    private function grabBuyers()
    {
        $buyerModel = new BuyerModel();
        return $buyerModel->findAll();
    }
    private function grabOrdersBuyer($orderID)
    {
        $buyerModel = new BuyerModel();
        $orderModel = new OrderModel();
        $foundOrder = $orderModel->find($orderID);

        return $buyerModel->find($foundOrder['Buyer_ID']);
    }
}
