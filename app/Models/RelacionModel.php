<?php

namespace App\Models;
use CodeIgniter\Model;

class RelacionModel extends Model
{
    protected $table      = 'registro.rel_tablas';
    protected $primaryKey = 'id_rel';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['fk_nom_curso', 'fk_usuarios', 'fk_opcionales', 'activo'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}