<?php

namespace App\Models;
use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table      = 'registro.roles';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nom_rol', 'activo'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}