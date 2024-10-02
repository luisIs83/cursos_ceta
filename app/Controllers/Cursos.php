<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursosModel;
use App\Models\UsuariosModel;
use App\Models\PeriodosModel;

class Cursos extends BaseController
{
    protected $cursos, $usuarios, $periodos;
    protected $reglas;

    public function __construct()
    {
        $this->cursos = new CursosModel();
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
    $cursos = $this->cursos->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Cursos', 'datos' => $cursos];

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
    $data = ['titulo' => 'Agregar curso', 'usuarios' => $usuarios];
    echo view('header');
    echo view('cursos/nuevo', $data);
    echo view('footer');
}

public function insertar()
{
    if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
        $this->cursos->save(['id_usuarios' => $this->request->getPost('id_usuarios'),
                             'nom_curso' => $this->request->getPost('nombre')]);
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
    $curso = $this->cursos->where('id_cursos',$id_cursos)->first();
    $data = ['titulo' => 'Editar curso', 'datos' => $curso, 'usuarios' => $usuarios, 'periodos' => $periodos];
    echo view('header');
    echo view('cursos/editar', $data);
    echo view('footer');
}

public function actualizar()
{
    $this->cursos->update($this->request->getPost('id_cursos'), ['nom_curso' => $this->request->getPost('nombre'),
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
