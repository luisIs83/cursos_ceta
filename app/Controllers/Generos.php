<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GenerosModel;

class Generos extends BaseController
{
    protected $generos;
    protected $reglas;

    public function __construct()
    {
        $this->generos = new GenerosModel();
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
    $generos = $this->generos->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Géneros', 'datos' => $generos];

    echo view('header');
    echo view('generos/generos', $data);
    echo view('footer');
}

public function eliminados($activo = '0')
{
    $generos = $this->generos->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Géneros eliminados', 'datos' => $generos];

    echo view('header');
    echo view('generos/eliminados', $data);
    echo view('footer');
}

public function nuevo() 
{
    $data = ['titulo' => 'Agregar género'];
    echo view('header');
    echo view('generos/nuevo', $data);
    echo view('footer');
}

public function insertar()
{
    if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
        $this->generos->save(['nom_genero' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/generos');
    } else {
        $data = ['titulo' => 'Agregar género', 'validation' => $this->validator];

        echo view('header');
        echo view('carreras/nuevo', $data);
        echo view('footer');
    }
} 

public function editar($id_gen) 
{
    $genero = $this->generos->where('id_gen',$id_gen)->first();
    $data = ['titulo' => 'Editar género', 'datos' => $genero];
    echo view('header');
    echo view('generos/editar', $data);
    echo view('footer');
}

public function actualizar()
{
    $this->generos->update($this->request->getPost('id_gen'), ['nom_genero' => $this->request->getPost('nombre')]);
    return redirect()->to(base_url().'/generos');
} 

public function eliminar($id_gen)
{
    $this->generos->update($id_gen, ['activo' => '0']);
    return redirect()->to(base_url().'/generos');
} 

public function reingresar($id_gen)
{
    $this->generos->update($id_gen, ['activo' => '1']);
    return redirect()->to(base_url().'/generos');
}
}   

?>