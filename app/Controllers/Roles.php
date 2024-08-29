<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RolesModel;

class Roles extends BaseController
{
    protected $roles;
    protected $reglas;

    public function __construct()
    {
        $this->roles = new RolesModel();

        helper(['form']);

        $this->reglas = ['nom_rol' => [      
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo "Nombre" es obligatorio.'
            ]
        ]
    ];
}

public function index($activo = '1')
{
    $roles = $this->roles->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Roles', 'datos' => $roles];

    echo view('header');
    echo view('roles/roles', $data);
    echo view('footer');
}

public function eliminados($activo = '0')
{
    $roles = $this->roles->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Roles eliminados', 'datos' => $roles];

    echo view('header');
    echo view('roles/eliminados', $data);
    echo view('footer');
}

public function nuevo() 
{
    $data = ['titulo' => 'Agregar rol'];
    echo view('header');
    echo view('roles/nuevo', $data);
    echo view('footer');
}

public function insertar()
{
    
    if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
        $this->roles->save(['nom_rol' => $this->request->getPost('nom_rol')]);
        return redirect()->to(base_url().'/roles');
    } else {
        $data = ['titulo' => 'Agregar rol', 'validation' => $this->validator];

        echo view('header');
        echo view('roles/nuevo', $data);
        echo view('footer');
    }
    
} 

public function editar($id) 
{
    $rol = $this->roles->where('id',$id)->first();
    $data = ['titulo' => 'Editar rol', 'datos' => $rol];
    echo view('header');
    echo view('roles/editar', $data);
    echo view('footer');
}

public function actualizar()
{
    $this->roles->update($this->request->getPost('id'), ['nom_rol' => $this->request->getPost('nom_rol')]);
    return redirect()->to(base_url().'/roles');
} 

public function eliminar($id_rol)
{
    $this->roles->update($id_rol, ['activo' => '0']);
    return redirect()->to(base_url().'/roles');
} 

public function reingresar($id_rol)
{
    $this->roles->update($id_rol, ['activo' => '1']);
    return redirect()->to(base_url().'/roles');
}
}

?>