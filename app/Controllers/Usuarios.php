<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CarreraModel;
use App\Models\CategoriasModel;
use App\Models\GenerosModel;
use App\Models\DependenciasModel;
use App\Models\CursosModel;
use App\Models\OpcionalesModel;
use App\Models\RolesModel;

class Usuarios extends BaseController
{
    protected $usuarios;
    protected $categorias;
    protected $generos;
    protected $carreras;
    protected $dependencias;
    protected $cursos;
    protected $opcionales;
    protected $reglasLogin;
    protected $relacion;

    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->carreras = new CarreraModel();
        $this->categorias = new CategoriasModel();
        $this->generos = new GenerosModel();
        $this->dependencias = new DependenciasModel();
        $this->cursos = new CursosModel();
        $this->opcionales = new OpcionalesModel();
        $this->roles = new RolesModel();
        
        helper(['form']);       

        $this->reglasLogin = [
            'usuario' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.'
            ]
        ],
         'password' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.'
            ]
        ]   
    ];

    }

    public function index()
    {
        //echo view('header');
        echo view('usuarios/usuarios');
        //echo view('footer');      
    }

    public function nuevo()
    {
        $dependencias = $this->dependencias->where('activo', '1')->findAll();
        $carreras = $this->carreras->where('activo', '1')->findAll();
        $categorias = $this->categorias->where('activo', '1')->findAll();
        $generos = $this->generos->where('activo', '1')->findAll();
        $cursos = $this->cursos->where('activo', '1')->findAll();
        $roles = $this->roles->where('activo', '1')->findAll();

        $data = [
            'dependencias' => $dependencias, 
            'carreras' => $carreras,
            'categorias' => $categorias, 
            'generos' => $generos, 
            'cursos' => $cursos,
            'roles' => $roles 
        ];

        //echo view('header');
        echo view('usuarios/nuevo', $data);
        //echo view('footer');
    }

    public function nuevoProfCurso()
    {
        $cursos = $this->cursos->where('activo', '1')->findAll();
        //$roles = $this->roles->where('activo', '1')->findAll();

        $data = [ 
            'cursos' => $cursos,
            //'roles' => $roles 
        ];

        echo view('header');
        echo view('usuarios/nuevoProfCurso', $data);
        echo view('footer');
    }

    public function buscar()
    {     
        
        $generos = $this->generos->where('activo', '1')->findAll();
        $categorias = $this->categorias->where('activo', '1')->findAll();
        $carreras = $this->carreras->where('activo', '1')->findAll();
        $dependencias = $this->dependencias->where('activo', '1')->findAll();
        $cursos = $this->cursos->where('activo', '1')->findAll();
        $usuario = $this->request->getPost('usuario');
        $users = $this->usuarios->where('usuario', $this->request->getPost('usuario'))->find();

        $data = [ 
            //'titulo' => 'Agregar Visitante', 
            'carreras' => $carreras,
            'dependencias' => $dependencias,
            'categorias' => $categorias, 
            'generos' => $generos, 
            'users' => $users, 
            'cursos' => $cursos, 
            'numero' => $usuario
            
        ];

       
    }

    public function insertar()
    {
    
        // Verificar si el usuario ya existe
        $nombreUsuario = $this->request->getPost('usuario');
        $usuarioExistente = $this->usuarios->where('usuario', $nombreUsuario)->first();

        if ($usuarioExistente) {
            // Redirigir con los datos previamente ingresados para que el usuario no tenga que volver a escribir todo
            return redirect()->back()->withInput()->with('errorss', 'El usuario ya está registrado. <br/> Si olvidó su contraseña comuniquese <br/> al correo ceta@zaragoza.unam.mx');
        } else {
            // Hash de la contraseña
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            // Guardar los datos
            $this->usuarios->insert([
                'usuario' => $nombreUsuario,
                'email' => $this->request->getPost('email'),
                'nombre' => $this->request->getPost('nombre'),
                'ap_paterno' => $this->request->getPost('ap_paterno'),
                'ap_materno' => $this->request->getPost('ap_materno'),
                'password' => $hash,
                'cat_genero' => $this->request->getPost('cat_genero'),
                'cat_categoria' => $this->request->getPost('cat_categoria'),
                'cat_carrera' => $this->request->getPost('cat_carrera'),
                'num_celular' => $this->request->getPost('num_celular'),
                'cat_dependencia' => $this->request->getPost('cat_dependencia'),
                'fecha_inicio' => $this->request->getPost('fecha_inicio'),
                //'otra_categoria' => $this->request->getPost('otra_categoria'),
                //'otra_carrera' => $this->request->getPost('otra_carrera'),
                //'otra_dependencia' => $this->request->getPost('otra_dependencia'),
                'cat_rol' => 3
            ]);

            // Enviar el             
        $this->enviarCorreoConfirmacion($this->request->getPost('email'), $this->request->getPost('nombre'), $this->request->getPost('password'), $this->request->getPost('usuario'));

            // En tu controlador, después de registrar el usuario:
               // session()->setFlashdata('success', 'Registro exitoso, puede revisar la bandeja de entrada del correo que registró para continuar con la inscripción a los cursos y talleres. Gracias.');
            return redirect()->to('/usuarios/login'); // Redirige a la página de inicio de sesión o donde desees
        }    
    }

/*public function insertarProf()
    {        

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            // Guardar los datos
            $this->usuarios->save([
                'usuario' => $this->request->getPost('usuario'),
                //'email' => $this->request->getPost('email'),
                'nombre' => $this->request->getPost('nombre'),
                'ap_paterno' => $this->request->getPost('ap_paterno'),
                'ap_materno' => $this->request->getPost('ap_materno'),
                'password' => $hash,
                'cat_rol' => 2
                ]);

            return redirect()->to(base_url());            
    }*/

    // Método para enviar el correo
    private function enviarCorreoConfirmacion($correoDestino, $nombre, $password, $usuario)
    {
        // Cargar el servicio de email
        $email = \Config\Services::email();

        // Configurar los detalles del correo
        $email->setTo($correoDestino);
        $email->setFrom('noreply.ceta@zaragoza.unam.mx', 'Cursos y talleres del CETA');
        $email->setSubject('Confirmación de Registro');
        
        // El cuerpo del mensaje
        $mensaje = "
            <div style='font-size: 16px; line-height: 1.5;'>
                Estimado(a) <strong>$nombre</strong>, <br><br>

                Este es un correo de confirmación. 
                Gracias por concluir su registro a nuestro sistema de inscripciones. <br><br>

                Los datos con los que se registró y con los que puede entrar al sistema son:<br><br>

                <strong>Usuario:</strong> $usuario<br>
                <strong>Contraseña:</strong> $password<br><br>
        
                <em>Conservela en un lugar seguro para no olvidarla.</em><br><br>

                Ya puede inscribirse a nuestros cursos y talleres accediendo a nuestro sitio web o desde el siguiente enlace:<br><br>

                <p><a href='https://ocelote.zaragoza.unam.mx/~registrov/ceta/' style='font-size: 18px; color: #007bff; text-decoration: none;'>
                <strong>Confirmar mi cuenta</strong></a></p>
            </div>";

        $email->setMessage($mensaje);

        if ($email->send()) {
            // Opcionalmente puedes redirigir a una página de éxito o mostrar un mensaje
            session()->setFlashdata('success', 'Correo de confirmación enviado correctamente.');
        } else {
            // Mostrar errores en caso de fallo
            log_message('error', 'Error al enviar el correo: ' . print_r($data, true));
            session()->setFlashdata('error', 'Hubo un problema al enviar el correo de confirmación. Inténtalo de nuevo más tarde.');
        }
    }

    public function login(){

        echo view('login');
    }

    public function valida(){
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)) {
            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');
            $datosUsuario = $this->usuarios->where('usuario', $usuario)->first();

            if($datosUsuario != null){
                if(password_verify($password, $datosUsuario['password'])){
                    $datosSesion = [
                        'id_usuario' => $datosUsuario['id_user'],
                        'nombre' => $datosUsuario['nombre'],
                        'c_rol' => $datosUsuario['cat_rol'], // Rol del usuario (Administrador, Profesor, Usuario)
                    ];

                        // Iniciamos la sesión
                        $session = session();
                        $session->set($datosSesion);

                        // Redirección según el rol del usuario
                            switch ($datosSesion['c_rol']) {
                                case 1: // Administrador
                                    return redirect()->to(base_url() . '/principal');  // Vista para el administrador
                                    break;

                                case 2: // Profesor
                                    return redirect()->to(base_url() . '/relacion');  // Vista para el profesor
                                    break;

                                case 3: // Usuario
                                    return redirect()->to(base_url() . '/relacion');  // Vista para el usuario normal
                                    break;

                                default:
                                // Si no tiene rol, redirigir a una página de error o logout
                                return redirect()->to(base_url() . '/logout');
                            }
                } else {
                    // Contraseña incorrecta
                    $data['error'] = "Contraseña incorrecta.";  
                        echo view('login', $data);
                }
            } else {
                // Usuario no existe
                $data['error'] = "El usuario no existe.";
                    echo view('login', $data);
            }
        } else {
            // Error en la validación de formularios
            $data = ['validation' => $this->validator];
                echo view('login', $data);
        }
    }


    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }

    public function obtenerNombres()
    {
        $tipo = $_POST['id_motivo'] ?? null;

        $valores = $this->nombre_motivos->where('id_motivo', $tipo)->find();

       
        if($valores != null){
            foreach($valores as $row){ 
                echo '<option value="'.$row['id'].'">'.$row['nombre_mot'].'</option>';
            } 
        }else{
            echo '<option value="">Sin Opciones</option>';
        }
              

    }
}

?>
