<?php

namespace App\Controllers; 

use App\Controllers\BaseController;
use App\Models\CursosModel;

Class Principal extends BaseController
{
	protected $cursos;

	public function __construct()
	{
		$this->cursos = new CursosModel;
	}

public function index(){

        echo view('principal');
	}	
}