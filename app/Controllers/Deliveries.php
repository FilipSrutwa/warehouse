<?php

namespace App\Controllers;

class Deliveries extends BaseController
{
    public function getIndex()
    {
        return view('deliveries');
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
