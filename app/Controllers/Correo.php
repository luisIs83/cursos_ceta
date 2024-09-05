<?php 	

namespace App\Controllers;

class Correo extends BaseController{

	public function index(){

		$email = \Config\Services::email();

        $email->setFrom('luis.saldivar19@gmail.com', 'Luis Angel Saldivar');
        $email->setTo('tecnologia.estadistica@zaragoza.unam.mx');
        //$email->setCC('another@another-example.com');
        //$email->setBCC('them@their-example.com');

        $mensaje = "
            <h2>Gracias por registrarte al curso </h2>

        "

        $email->setSubject('Confirmación de registro');
        $email->setMessage('Testing the email class.');

        if ($email->send()) {
            echo "Correo enviado";
        }else{
            echo "Error";
        }
	}
}

?>