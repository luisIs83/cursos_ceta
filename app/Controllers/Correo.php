<?php 	

namespace App\Controllers;

class Correo extends BaseController{

	public function index(){

		$email = \Config\Services::email();

        $email->setFrom('luis.saldivar19@gmail.com', 'Luis Angel Saldivar');
        $email->setTo('tecnologia.estadistica@zaragoza.unam.mx');
        //$email->setCC('another@another-example.com');
        //$email->setBCC('them@their-example.com');

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');

        if ($email->send()) {
            echo "Correo enviado";
        }else{
            echo "Error";
        }
	}
}

?>