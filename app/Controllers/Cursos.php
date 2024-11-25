<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursosModel;
use App\Models\UsuariosModel;
use App\Models\PeriodosModel;
use App\Models\ModalidadesModel;
use App\Models\TiposActModel;

class Cursos extends BaseController
{
    protected $cursos, $usuarios, $periodos, $modalidades, $tiposAct;
    protected $reglas;

    public function __construct()
    {
        $this->cursos = new CursosModel();
        $this->usuarios = new UsuariosModel();
        $this->periodos = new PeriodosModel();
        $this->modalidades = new ModalidadesModel();
        $this->tiposAct = new TiposActModel();
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
    $cursos = $this->cursos->where('activo',$activo)->findAll();
    $usuarios = $this->usuarios->where('activo',$activo)->findAll();
    $modalidades = $this->modalidades->where('activo',$activo)->findAll();
    $tiposAct = $this->tiposAct->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Cursos', 'datos' => $cursos, 
            'usuarios' => $usuarios, 'modalidades' => $modalidades,
            'tiposAct' => $tiposAct];

    echo view('header');
    echo view('cursos/cursos', $data);
    echo view('footer');
}

public function oferta_cursos($activo = '1')
{
    $oferta_cursos = $this->cursos->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Cursos ofertados', 'datos' => $oferta_cursos];

    echo view('header');
    echo view('cursos/oferta_cursos', $data);
    echo view('footer');
}

public function eliminados($activo = '0')
{
    $cursos = $this->cursos->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Cursos eliminadas', 'datos' => $cursos];

    echo view('header');
    echo view('cursos/eliminados', $data);
    echo view('footer');
}

public function nuevo() 
{
    $usuarios = $this->usuarios->where('activo', '1')->findAll();
    $periodos = $this->periodos->where('activo', '1')->findAll();
    $modalidades = $this->modalidades->where('activo', '1')->findAll();
    $tiposAct = $this->tiposAct->where('activo', '1')->findAll();
    $data = ['titulo' => 'Agregar curso', 'usuarios' => $usuarios, 
            'periodos' => $periodos, 'modalidades' => $modalidades,
            'tiposAct' => $tiposAct];
    echo view('header');
    echo view('cursos/nuevo', $data);
    echo view('footer');
}

public function insertar()
{
    if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
        $this->cursos->save(['id_usuarios' => $this->request->getPost('id_usuarios'),
                             'nom_curso' => $this->request->getPost('nombre'),
                             'id_periodo' => $this->request->getPost('id_periodo'),
                             'descripcion' => $this->request->getPost('descripcion'),
                             'fk_id_modalidad' => $this->request->getPost('fk_id_modalidad'),
                             'fk_id_tipo_act' => $this->request->getPost('fk_id_tipo_act'),
                             'fecha_ini' => $this->request->getPost('fecha_ini'),
                             'fecha_fin' => $this->request->getPost('fechaFin')]);
        return redirect()->to(base_url().'/cursos');   
    } else {
        $data = ['titulo' => 'Agregar curso', 'validation' => $this->validator];

        echo view('header');
        echo view('cursos/nuevo', $data);
        echo view('footer');
    }
} 

public function editar($id_cursos) 
{
    $periodos = $this->periodos->where('activo', '1')->findAll();
    $usuarios = $this->usuarios->where('activo', '1')->findAll();
    $modalidades = $this->modalidades->where('activo', '1')->findAll();
    $tiposAct = $this->tiposAct->where('activo', '1')->findAll();
    $curso = $this->cursos->where('id_cursos',$id_cursos)->first();
    $data = ['titulo' => 'Editar curso', 'datos' => $curso, 'usuarios' => $usuarios, 'periodos' => $periodos,
            'modalidades' => $modalidades, 'tiposAct' => $tiposAct];
    echo view('header');
    echo view('cursos/editar', $data);
    echo view('footer');
}

public function actualizar()
{
    $this->cursos->update($this->request->getPost('id_cursos'), ['nom_curso' => $this->request->getPost('nombre'),
                                                                 'id_periodo' => $this->request->getPost('id_periodo'),
                                                                 'descripcion' => $this->request->getPost('descripcion'),
                                                                 'fk_id_modalidad' => $this->request->getPost('fk_id_modalidad'),
                                                                 'fk_id_tipo_act' => $this->request->getPost('fk_id_tipo_act'),
                                                                 'fecha_ini' => $this->request->getPost('fecha_ini'),
                                                                 'fecha_fin' => $this->request->getPost('fecha_fin'),
                                                                 'id_usuarios' => $this->request->getPost('id_usuarios')]);
    return redirect()->to(base_url().'/cursos');
} 

public function eliminar($id_cursos)
{
    $this->cursos->update($id_cursos, ['activo' => '0']);
    return redirect()->to(base_url().'/cursos');
} 

public function reingresar($id_cursos)
{
    $this->cursos->update($id_cursos, ['activo' => '1']);
    return redirect()->to(base_url().'/cursos');
}
}

?>
