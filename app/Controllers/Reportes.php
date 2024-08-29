<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReportesModel;
use App\Models\UsuariosModel;
use App\Models\CarreraModel;
use App\Models\CategoriasModel;
use App\Models\GenerosModel;
use App\Models\DependenciasModel;
use App\Models\CursosModel;
use App\Models\OpcionalesModel;

class Reportes extends BaseController
{
    protected $reportes;
    protected $usuarios;
    protected $categorias;
    protected $generos;
    protected $carreras;
    protected $dependencias;
    protected $cursos;
    protected $opcionales;
    protected $idSesion;

    public function __construct()
    {
        $this->reportes = new ReportesModel();
        $this->usuarios = new UsuariosModel();
        $this->carreras = new CarreraModel();
        $this->categorias = new CategoriasModel();
        $this->generos = new GenerosModel();
        $this->dependencias = new DependenciasModel();
        $this->cursos = new CursosModel();
        $this->opcionales = new OpcionalesModel();
    }

    public function index($activo = '1')
    {
        $reportes = $this->reportes->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Reportes', 'datos' => $reportes];

        echo view('header');
        echo view('reportes/reportes', $data);
        echo view('footer');
    }

    public function repor_cursos()
    {
        
        $var = session();        
        $id_usuario = $var->id_usuario;        

        $cursos = $this->cursos->where('id_usuarios', $id_usuario)->findAll();        
        //$periodo = $this->cursos->where('id_periodo', $id_periodo)->findAll();        
        
        $data = ['titulo' => 'Mis Cursos', 'datos' => $cursos];  

        echo view('header');
        echo view('reportes/repor_cursos', $data);
        echo view('footer');
        
        
        
    }

    public function ver(){
        $ver = $this->fn_reportes->where('fk_nom_curso', 'fk_nom_curso')->findAll;
        $data = ['titulo' => 'Profesores inscritos', 'datos' => $ver];
            echo view('header');
            echo view('reportes/ver', $data);
            echo view('footer');
    }
}
?>
