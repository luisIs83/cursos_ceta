<?php

namespace App\Models;
use CodeIgniter\Model;

class TiposActModel extends Model
{
    protected $table      = 'registro.tipo_actividad';
    protected $primaryKey = 'id_tipo_act';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nom_tipo_actividad', 'activo'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}