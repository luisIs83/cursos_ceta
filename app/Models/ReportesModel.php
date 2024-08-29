<?php

namespace App\Models;
use CodeIgniter\Model;

class ReportesModel extends Model
{
    protected $table      = 'registro.fn_reportes()';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre',
    							'nom_dependencia',
    							'nom_carrera',
    							'nom_cat',
    							'email',
    							'nom_genero',
    							'num_celular',
    							'activo', 
    							'fk_nom_curso',
    							'nom_curso'                               
                            ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
}

