<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OpcionalesModel;

class Opcionales extends BaseController
{
    protected $opcionales;

    public function __construct()
    {
        $this->opcionales = new OpcionalesModel();
    }

    public function index()
    {        
        //echo view('header');
        echo view('opcionales/opcionales');
        //echo view('footer');
    }

    public function insertar(){
        $this->opcionales->save([
            'op_uno' => $this->request->getPost('op_uno'),
            'op_dos' => $this->request->getPost('op_dos'),
            'op_tres' => $this->request->getPost('op_tres'),
            'op_cuatro' => $this->request->getPost('op_cuatro')
        ])
            return redirect()->to(base_url() . '/usuarios');
    }
}

?>