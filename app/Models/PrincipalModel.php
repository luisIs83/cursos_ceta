<?php

namespace App\Models;
use CodeIgniter\Model;

class PrincipalModel extends Model
{
    protected $table      = 'registro.fn_rel_tablas()';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre',
    							'curso',
                                'periodo',
                                'activo'                              
                            ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
}

