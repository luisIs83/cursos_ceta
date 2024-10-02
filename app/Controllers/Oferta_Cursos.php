<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Oferta_CursosModel;
use App\Models\CursosModel;
use App\Models\PeriodosModel;
use App\Models\UsuariosModel;

class Oferta_Cursos extends BaseController
{
    protected $oferta_cursos, $usuarios, $periodos;
    protected $reglas;

    public function __construct()
    {
        $this->cursos = new Oferta_CursosModel();
        $this->usuarios = new UsuariosModel();
        $this->periodos = new PeriodosModel();
        helper(['form']);

        $this->reglas = ['nombre' => [      
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo "Nombre" es obligatorio.'
            ]
        ]
    ];
}

public function index($activo = '1')
{
    $oferta_cursos = $this->cursos->getOferta_CursosOrdenados('nom_curso', $activo)->findAll();
    $data = ['titulo' => 'Cursos ofertados', 'datos' => $oferta_cursos];

        echo view('header');  
        echo view('oferta_cursos/oferta_cursos', $data);  
        echo view('footer');  
    }
}
?>