<?php

namespace App\Models;
use CodeIgniter\Model;

class CursosModel extends Model
{
    protected $table      = 'registro.cursos';
    protected $primaryKey = 'id_cursos';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nom_curso', 'id_usuarios', 'id_periodo', 'descripcion', 'fk_id_modalidad', 'fk_id_tipo_act', 'fecha_ini', 'fecha_fin', 'activo'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
