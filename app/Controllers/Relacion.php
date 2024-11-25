<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RelacionModel;
use App\Models\CursosModel;
use App\Models\UsuariosModel;
use App\Models\OpcionalesModel;
use App\Models\ModalidadesModel;
use App\Models\TiposActModel;


class Relacion extends BaseController
{
    protected $relacion;
    protected $cursos;
    protected $usuarios;
    protected $opcionales;
    protected $modalidades;
    protected $tiposAct;

    public function __construct()
    {
        $this->relacion = new RelacionModel();
        $this->cursos = new CursosModel();
        $this->usuarios = new UsuariosModel();
        $this->opcionales = new OpcionalesModel();
        $this->modalidades = new ModalidadesModel();
        $this->tiposAct = new TiposActModel();
    }

   /* public function index($activo = '1')
    {
        //$opcionales = $this->opcionales->where('activo',$activo)->findAll();
        $usuarios = $this->usuarios->where('activo',$activo)->findAll();
        $cursos = $this->cursos->where('activo',$activo)->findAll();

        $data = ['titulo' => 'Cursos disponibles:', 'usuarios' => $usuarios,  
                                                    'cursos' => $cursos];

        echo view('header');                                                 
        echo view('relacion/relacion', $data);
        echo view('footer');
    }*/

public function index($activo = '1')
{
    $usuarios = $this->usuarios->where('activo', $activo)->findAll();
    $cursos = $this->cursos->where('activo', $activo)->findAll();    
    $modalidades = $this->modalidades->where('activo', $activo)->findAll();
    $tiposAct = $this->tiposAct->where('activo', $activo)->findAll();
    // Obtener el ID del usuario de la sesión
    $idUsuarioLogueado = session()->get('id_usuario');
    if (!$idUsuarioLogueado) {
        return redirect()->to(base_url().'/login');
    }

    // Verificar si el usuario está inscrito en los cursos
    //$inscripciones = $this->relacion->where('fk_usuarios', $idUsuarioLogueado)->findColumn('fk_nom_curso');
    $inscripciones = $this->relacion->where('fk_usuarios', $idUsuarioLogueado)->findColumn('fk_nom_curso') ?? [];

    
    $data = [
        'titulo' => 'Cursos disponibles:', 
        'usuarios' => $usuarios,
        'modalidades' => $modalidades,
        'cursos' => $cursos,
        'tiposAct' => $tiposAct,
        'inscripciones' => $inscripciones 
    ];

    echo view('header');                                                 
    echo view('relacion/relacion', $data);
    echo view('footer');
}

    public function insertar()
{
    $idUsuarioLogueado = session()->get('id_usuario');
    $idCurso = $this->request->getPost('nombre_curso');

    // Verificar si ya existe una inscripción para este usuario y curso
    $existeInscripcion = $this->relacion->where([
        'fk_usuarios' => $idUsuarioLogueado,
        'fk_nom_curso' => $idCurso
    ])->first();

    if ($existeInscripcion) {
        return $this->response->setJSON(['success' => false, 'message' => 'Ya estás inscrito en este curso']);
    }

    // Insertar en la tabla de opcionales
    $this->opcionales->insert([
        'op_uno' => $this->request->getPost('op_uno'),
        'op_dos' => $this->request->getPost('op_dos'),
        'op_tres' => $this->request->getPost('op_tres'),
        'op_cuatro' => $this->request->getPost('op_cuatro'),
    ]);

    $idOpcionalesReg = $this->opcionales->getInsertID();

    // Insertar en la tabla de relación con los IDs correspondientes
    $this->relacion->insert([
        'fk_usuarios' => $idUsuarioLogueado,
        'fk_nom_curso' => $idCurso,
        'fk_opcionales' => $idOpcionalesReg
    ]);

    return $this->response->setJSON(['success' => true, 'message' => 'Inscripción exitosa']);
}

     public function misCursos()
    {
        
        $var = session();        
        $id_usuario = $var->id_usuario;      

        $cursos = $this->cursos->where('id_usuarios', $id_usuario)->findAll();        
        //$periodo = $this->cursos->where('id_periodo', $id_periodo)->findAll();        
        
        $data = ['titulo' => 'Mis Cursos', 'datos' => $cursos];  

        echo view('header');
        echo view('relacion/misCursos', $data);
        echo view('footer');
    }

    public function espera($activo = '0')
{
    //$modalidades = $this->modalidades->where('activo', $activo)->findAll();
    $usuarios = $this->usuarios->where('activo', $activo)->findAll();
    $cursos = $this->cursos->where('activo', $activo)->findAll();
    
    // Obtener el ID del usuario de la sesión
    $idUsuarioLogueado = session()->get('id_usuario');
    if (!$idUsuarioLogueado) {
        return redirect()->to(base_url().'/login');
    }

    // Verificar si el usuario está inscrito en los cursos
    //$inscripciones = $this->relacion->where('fk_usuarios', $idUsuarioLogueado)->findColumn('fk_nom_curso');
    $inscripciones = $this->relacion->where('fk_usuarios', $idUsuarioLogueado)->findColumn('fk_nom_curso') ?? [];

    
    $data = [
        'titulo' => 'Elija un curso para estar en lista de espera:', 
        'usuarios' => $usuarios,
        'modalidades' => $modalidades,
        'cursos' => $cursos,
        'inscripciones' => $inscripciones 
    ];

    echo view('header');                                                 
    echo view('relacion/relacion', $data);
    echo view('footer');
}
 
}

?>