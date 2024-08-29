<?php

namespace App\Models;
use CodeIgniter\Model;

class Prof_cursosModel extends Model
{
    protected $table      = 'registro.usuarios';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['usuario', 'password', 'nombre', 'ap_paterno', 'ap_materno', 'email', 'cat_carrera', 'cat_categoria', 'cat_dependencia', 'cat_genero', 'num_celular', 'cat_rol', 'activo'];

    protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}