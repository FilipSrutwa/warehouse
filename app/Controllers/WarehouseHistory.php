<?php

namespace App\Controllers;

class WarehouseHistory extends BaseController
{
    public function getIndex()
    {
        return view('warehouseHistory');
    }
    public function getAddGoodsIssue()
    {
        return view('addGoodsIssue');
    }
    public function getAddGoodsDelivery()
    {
        return view('addGoodsDelivery');
    }
}
