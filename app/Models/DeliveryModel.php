<?php

namespace App\Models;

use CodeIgniter\Model;

class DeliveryModel extends Model
{
    protected $table      = 'deliveries';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID', 'Item', 'Amount', 'Created_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'Created_at';
    protected $updatedField  = 'Updated_at';
    protected $deletedField  = 'Deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
}
