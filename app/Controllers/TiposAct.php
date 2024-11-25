<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TiposActModel;

class TiposAct extends BaseController
{
    protected $tiposAct;
    protected $reglas;

    public function __construct()
    {
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
    $tiposAct = $this->tiposAct->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Tipos de Actividad', 'tiposAct' => $tiposAct];

    echo view('header');
    echo view('tiposAct/tiposAct', $data);
    echo view('footer');
}

public function eliminados($activo = '0')
{
    $tiposAct = $this->tiposAct->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Tipos de Actividad eliminadas', 'tiposAct' => $tiposAct];

    echo view('header');
    echo view('tiposAct/eliminados', $data);
    echo view('footer');
}

public function nuevo() 
{
    $data = ['titulo' => 'Agregar Tipos de Actividad.'];
    echo view('header');
    echo view('tiposAct/nuevo', $data);
    echo view('footer');
}

public function insertar()
{
    
    if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
        $this->tiposAct->save(['nom_carrera' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/tiposAct');
    } else {
        $data = ['titulo' => 'Agregar Tipos de Actividad', 'validation' => $this->validator];

        echo view('header');
        echo view('tiposAct/nuevo', $data);
        echo view('footer');
    }
    
} 

public function editar($id_carrera) 
{
    $carrera = $this->tiposAct->where('id_carrera',$id_carrera)->first();
    $data = ['titulo' => 'Editar Tipos de Actividad', 'tiposAct' => $carrera];
    echo view('header');
    echo view('tiposAct/editar', $data);
    echo view('footer');
}

public function actualizar()
{
    $this->tiposAct->update($this->request->getPost('id_carrera'), ['nom_carrera' => $this->request->getPost('nombre')]);
    return redirect()->to(base_url().'/tiposAct');
} 

public function eliminar($id_carrera)
{
    $this->tiposAct->update($id_carrera, ['activo' => '0']);
    return redirect()->to(base_url().'/tiposAct');
} 

public function reingresar($id_carrera)
{
    $this->tiposAct->update($id_carrera, ['activo' => '1']);
    return redirect()->to(base_url().'/tiposAct');
}
}

?>