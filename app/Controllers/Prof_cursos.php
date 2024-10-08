<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Prof_cursosModel;
use App\Models\CursosModel;
use App\Models\RolesModel;

class Prof_cursos extends BaseController
{
    protected $prof_cursos;
    protected $reglas;

    public function __construct()
    {
        $this->usuarios = new Prof_cursosModel();
        $this->cursos = new CursosModel();
        $this->roles = new RolesModel();

        helper(['form']);

        $this->reglas = [
            'usuario' => [      
            'rules' => 'required|is_unique[usuarios.usuario]',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.',
                'is_unique' => 'Ya existe un registro con el mismo usuario.'
            ]
        ]
    ];
}

public function index($activo = '1')
{
    $prof_cursos = $this->usuarios->where('activo', $activo)->findAll();
    $data = ['titulo' => 'Profesor de cursos del CETA', 'prof_cursos' => $prof_cursos];

    echo view('header');
    echo view('prof_cursos/prof_cursos', $data);
    echo view('footer');
}

public function eliminados($activo = '0')
{
    $prof_cursos = $this->usuarios->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Categorias eliminadas', 'datos' => $prof_cursos];

    //echo view('header');
    echo view('prof_cursos/eliminados', $data);
    //echo view('footer');
}

public function nuevo($activo = '1') 
{
    $roles = $this->roles->where('activo', '1')->findAll();
    $data = ['titulo' => 'Agregar curso a Profesor', 'roles' => $roles];
    //echo view('header');
    echo view('prof_cursos/nuevo', $data);
    //echo view('footer');
}

public function insertar()
{
    if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

        $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $this->usuarios->save([
            'usuario' => $this->request->getPost('usuario'),
            'password' => $hash,
            'nombre' => $this->request->getPost('nombre'),
            'ap_paterno' => $this->request->getPost('ap_paterno'),
            'ap_materno' => $this->request->getPost('ap_materno'), 
            'email' => $this->request->getPost('correo'),
            'cat_rol' => $this->request->getPost('cat_rol')]);

        $this->enviarCorreoConfirmacion($email, $nombre);
        
        return redirect()->to(base_url().'/prof_cursos');
    } else {
        $data = ['titulo' => 'Profesor', 'validation' => $this->validator];
        //echo view('header');
        echo view('prof_cursos/nuevo', $data);
        //echo view('footer');
    }
} 

// Método para enviar el correo
    private function enviarCorreoConfirmacion($email, $nombre)
    {
        // Cargar el servicio de email
        $email = \Config\Services::email();

        // Configurar los detalles del correo
        $email->setTo($email);
        $email->setFrom('luis.saldivar19@gmail.com', 'Cursos y talleres del CETA');
        $email->setSubject('Confirmación de Registro');
        
        // El cuerpo del mensaje
        $mensaje = "
            <h2>Hola $nombre, gracias por registrarte</h2>
            <p>Por favor, confirma tu correo haciendo clic en el siguiente enlace:</p>
        ";
        $email->setMessage($mensaje);

        // Enviar el correo
        /*if ($email->send()) {
            // Opcionalmente puedes redirigir a una página de éxito o mostrar un mensaje
            echo "Correo de confirmación enviado correctamente.";
        } else {
            // Mostrar errores en caso de fallo
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }*/
    }

public function editar($id_user) 
{
    $roles = $this->roles->where('activo', '1')->findAll();
    $prof_cursos = $this->usuarios->where('id_user',$id_user)->first();
    $data = ['titulo' => 'Editar datos', 'datos' => $prof_cursos, 'roles' => $roles];
    echo view('header');
    echo view('prof_cursos/edit', $data);
    echo view('footer');
}

public function actualizar()
{
    $this->usuarios->update($this->request->getPost('id_user'), [
        'usuario' => $this->request->getPost('usuario'),
        'password' => $this->request->getPost('password'),
        'nombre' => $this->request->getPost('nombre'),
        'ap_paterno' => $this->request->getPost('ap_paterno'),
        'ap_materno' => $this->request->getPost('ap_materno'),
        'cat_rol' => $this->request->getPost('cat_rol')]);
    return redirect()->to(base_url().'/prof_cursos');
} 

public function eliminar($id)
{
    $this->usuarios->update($id, ['activo' => '0']);
    return redirect()->to(base_url().'/prof_cursos');
} 

public function reingresar($id)
{
    $this->usuarios->update($id, ['activo' => '1']);
    return redirect()->to(base_url().'/prof_cursos');
}
}

?>

