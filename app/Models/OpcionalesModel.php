<?php

namespace App\Models;
use CodeIgniter\Model;

class OpcionalesModel extends Model
{
    protected $table      = 'registro.opcionales';
    protected $primaryKey = 'id_opcionales';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['op_uno',
								'op_dos',
								'op_tres',
								'op_cuatro'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}