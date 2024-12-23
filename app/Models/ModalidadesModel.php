<?php

namespace App\Models;
use CodeIgniter\Model;

class ModalidadesModel extends Model
{
    protected $table      = 'registro.modalidad';
    protected $primaryKey = 'id_mod';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nom_mod', 'activo'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}