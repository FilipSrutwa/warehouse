<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemsModel extends Model
{
    protected $table      = 'order_items';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['ID', 'Order_ID', 'Warehouse_item_ID', 'Amount', 'Sell_price'];

    //protected $useTimestamps = true;
    //protected $createdField  = 'Created_at';
    //protected $updatedField  = 'Updated_at';
    //protected $deletedField  = 'Deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
}
