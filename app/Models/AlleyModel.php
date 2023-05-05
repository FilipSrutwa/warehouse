<?php

namespace App\Models;

use CodeIgniter\Model;

class AlleyModel extends Model
{
    protected $table      = 'warehouse_alleys';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ID', 'Name', 'Short_description'];

    protected $useTimestamps = false;
    //protected $createdField  = 'Created_at';
    //protected $updatedField  = 'Updated_at';
    //protected $deletedField  = 'Deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
}
