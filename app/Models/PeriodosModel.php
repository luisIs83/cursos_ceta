<?php

namespace App\Models;
use CodeIgniter\Model;

class PeriodosModel extends Model
{
    protected $table      = 'registro.periodos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'activo'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
