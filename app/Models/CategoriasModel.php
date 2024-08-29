<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoriasModel extends Model
{
    protected $table      = 'registro.categoria';
    protected $primaryKey = 'id_cat';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nom_cat', 'activo'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}