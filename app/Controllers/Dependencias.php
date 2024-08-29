<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DependenciasModel;

class Dependencias extends BaseController
{
    protected $dependencias;
    protected $reglas;

    public function __construct()
    {
        $this->dependencias = new DependenciasModel();
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
    $dependencias = $this->dependencias->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Dependencias', 'datos' => $dependencias];

    echo view('header');
    echo view('dependencias/dependencias', $data);
    echo view('footer');
}

public function eliminados($activo = '0')
{
    $dependencias = $this->dependencias->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Dependencias eliminadas', 'datos' => $dependencias];

    echo view('header');
    echo view('dependencias/eliminados', $data);
    echo view('footer');
}

public function nuevo() 
{
    $data = ['titulo' => 'Agregar dependencia'];
    echo view('header');
    echo view('dependencias/nuevo', $data);
    echo view('footer');
}

public function insertar()
{
    if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
        $this->dependencias->save(['nom_dep' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/dependencias');
    } else {
        $data = ['titulo' => 'Agregar dependencia', 'validation' => $this->validator];

        echo view('header');
        echo view('carreras/nuevo', $data);
        echo view('footer');
    }
} 

public function editar($id_dep) 
{
    $dependencia = $this->dependencias->where('id_dep',$id_dep)->first();
    $data = ['titulo' => 'Editar dependencia', 'datos' => $dependencia];
    echo view('header');
    echo view('dependencias/editar', $data);
    echo view('footer');
}

public function actualizar()
{
    $this->dependencias->update($this->request->getPost('id_dep'), ['nom_dep' => $this->request->getPost('nombre')]);
    return redirect()->to(base_url().'/dependencias');
} 

public function eliminar($id_dep)
{
    $this->dependencias->update($id_dep, ['activo' => '0']);
    return redirect()->to(base_url().'/dependencias');
} 

public function reingresar($id_dep)
{
    $this->dependencias->update($id_dep, ['activo' => '1']);
    return redirect()->to(base_url().'/dependencias');
}
}

?>

