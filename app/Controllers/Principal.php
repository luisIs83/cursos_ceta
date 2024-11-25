<?php

namespace App\Controllers; 

use App\Controllers\BaseController;
use App\Models\CursosModel;
use App\Models\PrincipalModel;
use App\Models\UsuariosModel;

Class Principal extends BaseController
{
	protected $cursos;
	protected $principal;
	protected $usuarios;

	public function __construct()
	{
		$this->cursos = new CursosModel;
		$this->principal = new PrincipalModel;
		$this->usuarios = new UsuariosModel;
	}

public function index($activo = '1'){

	$principal = $this->principal->where('activo',$activo)->findAll();
	$data = ['principal' => $principal];

		echo view('header');
        echo view('principal', $data);
        echo view('footer');
	}	
}