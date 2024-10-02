<?php

namespace App\Models;
use CodeIgniter\Model;

class Oferta_CursosModel extends Model
{
    protected $table      = 'registro.cursos';
    protected $primaryKey = 'id_cursos';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nom_curso', 'id_usuarios', 'periodo', 'activo'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getOferta_CursosOrdenados($campo = 'nom_curso', $activo = '1')
    {
        return $this->where('activo', $activo)
                    ->orderBy($campo, 'ASC');  
    }
}