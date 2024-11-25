<?php

namespace App\Models;
use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table      = 'registro.usuarios';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['email',
                                'password',
                                'nombre',
                                'ap_paterno', 
                                'ap_materno',
                                'cat_carrera',
                                'cat_categoria',
                                'cat_dependencia',
                                'cat_genero',
                                'activo',
                                'num_celular', 
                                'usuario',
                                'otra_categoria',
                                'otra_carrera',
                                'otra_dependencia',
                                'cat_rol'
                            ];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
}

        