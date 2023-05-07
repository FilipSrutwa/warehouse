<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table      = 'sales';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID', 'Item_ID', 'Amount', 'Sell_price', 'Buyer_ID', 'Employee_ID', 'Bag_ID'];

    protected $useTimestamps = true;
    protected $createdField  = 'Created_at';
    protected $updatedField  = 'Updated_at';
    protected $deletedField  = 'Deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
}
