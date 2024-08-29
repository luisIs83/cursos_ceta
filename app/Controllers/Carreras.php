<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CarreraModel;

class Carreras extends BaseController
{
    protected $carreras;
    protected $reglas;

    public function __construct()
    {
        $this->carreras = new CarreraModel();

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
    $carreras = $this->carreras->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Carreras', 'datos' => $carreras];

    echo view('header');
    echo view('carreras/carreras', $data);
    echo view('footer');
}

public function eliminados($activo = '0')
{
    $carreras = $this->carreras->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Carreras eliminadas', 'datos' => $carreras];

    echo view('header');
    echo view('carreras/eliminados', $data);
    echo view('footer');
}

public function nuevo() 
{
    $data = ['titulo' => 'Agregar carrera'];
    echo view('header');
    echo view('carreras/nuevo', $data);
    echo view('footer');
}

public function insertar()
{
    
    if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
        $this->carreras->save(['nom_carrera' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/carreras');
    } else {
        $data = ['titulo' => 'Agregar carrera', 'validation' => $this->validator];

        echo view('header');
        echo view('carreras/nuevo', $data);
        echo view('footer');
    }
    
} 

public function editar($id_carrera) 
{
    $carrera = $this->carreras->where('id_carrera',$id_carrera)->first();
    $data = ['titulo' => 'Editar carrera', 'datos' => $carrera];
    echo view('header');
    echo view('carreras/editar', $data);
    echo view('footer');
}

public function actualizar()
{
    $this->carreras->update($this->request->getPost('id_carrera'), ['nom_carrera' => $this->request->getPost('nombre')]);
    return redirect()->to(base_url().'/carreras');
} 

public function eliminar($id_carrera)
{
    $this->carreras->update($id_carrera, ['activo' => '0']);
    return redirect()->to(base_url().'/carreras');
} 

public function reingresar($id_carrera)
{
    $this->carreras->update($id_carrera, ['activo' => '1']);
    return redirect()->to(base_url().'/carreras');
}
}

?>