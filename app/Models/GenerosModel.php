<?php

namespace App\Models;
use CodeIgniter\Model;

class GenerosModel extends Model
{
    protected $table      = 'registro.genero';
    protected $primaryKey = 'id_gen';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nom_genero', 'activo'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    //protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}