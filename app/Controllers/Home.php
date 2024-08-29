<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('principal');
        echo view('footer');
    }
}
