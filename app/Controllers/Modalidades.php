<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModalidadesModel;

class Modalidades extends BaseController
{
    protected $modalidades;
    protected $reglas;

    public function __construct()
    {
        $this->modalidades = new ModalidadesModel();

        helper(['form']);

        $this->reglas = ['nomMod' => [      
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo "Nombre" es obligatorio.'
            ]
        ]
    ];
}

public function index($activo = '1')
{
    $modalidades = $this->modalidades->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Modalidades', 'modalidades' => $modalidades];

    echo view('header');
    echo view('modalidades/modalidades', $data);
    echo view('footer');
}

public function eliminados($activo = '0')
{
    $modalidades = $this->modalidades->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Modalidades eliminadas', 'modalidades' => $modalidades];

    echo view('header');
    echo view('modalidades/eliminados', $data);
    echo view('footer');
}

public function nuevo() 
{
    $data = ['titulo' => 'Agregar modalidad'];
    echo view('header');
    echo view('modalidades/nuevo', $data);
    echo view('footer');
}

public function insertar()
{
    
    if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
        $this->modalidades->save(['nom_mod' => $this->request->getPost('nomMod')]);
        return redirect()->to(base_url().'/modalidades');
    } else {
        $data = ['titulo' => 'Agregar modalidad', 'validation' => $this->validator];

        echo view('header');
        echo view('modalidades/nuevo', $data);
        echo view('footer');
    }
    
} 

public function editar($id_mod) 
{
    $modalidad = $this->modalidades->where('id_mod',$id_mod)->first();
    $data = ['titulo' => 'Editar modalidad', 'modalidades' => $modalidad];
    echo view('header');
    echo view('modalidades/editar', $data);
    echo view('footer');
}

public function actualizar()
{
    $this->modalidades->update($this->request->getPost('id_mod'), ['nom_mod' => $this->request->getPost('nomMod')]);
    return redirect()->to(base_url().'/modalidades');
} 

public function eliminar($id_mod)
{
    $this->modalidades->update($id_mod, ['activo' => '0']);
    return redirect()->to(base_url().'/modalidades');
} 

public function reingresar($id_mod)
{
    $this->modalidades->update($id_mod, ['activo' => '1']);
    return redirect()->to(base_url().'/modalidades');
}
}

?>