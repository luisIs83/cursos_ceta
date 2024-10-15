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
    protected $reglas;
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

        $this->reglas = [
            /*'usuario' => [      
            'rules' => 'required|is_unique[registro.usuarios]',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.',
                'is_unique' => 'Ya existe un registro con el mismo usuario.'
                ]
            ],
            'password' => [      
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'repassword' => [      
            'rules' => 'required|matches[password]',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.',
                'matches' => 'Las contraseñas no coinciden.'
                ]
            ]*/
        ];

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
    try {
        // Verificar si el usuario ya existe
        $nombreUsuario = $this->request->getPost('usuario');
        $usuarioExistente = $this->usuarios->where('usuario', $nombreUsuario)->first();

        if ($usuarioExistente) {
            // Redirigir con los datos previamente ingresados para que el usuario no tenga que volver a escribir todo
            return redirect()->back()->withInput()->with('errors', 'El usuario <?php echo $nombreUsuario ?> ya está registrado. <br/> Si olvidó su contraseña comuniquese <br/> al correo ceta@zaragoza.unam.mx');
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
                'cat_dependencia' => $this->request->getPost('cat_dependencia')
            ]);

            // Enviar el correo
            $this->enviarCorreoConfirmacion($this->request->getPost('email'), $this->request->getPost('nombre'), $this->request->getPost('password'));

            return redirect()->to(base_url());
        }
    } catch (\Exception $e) {
        // Mostrar cualquier error relacionado con la base de datos
        echo 'Error al insertar: ' . $e->getMessage();
    }
}


    // Método para enviar el correo
    private function enviarCorreoConfirmacion($correoDestino, $nombre, $password)
    {
        // Cargar el servicio de email
        $email = \Config\Services::email();

        // Configurar los detalles del correo
        $email->setTo($correoDestino);
        $email->setFrom('luis.saldivar19@gmail.com', 'Cursos y talleres del CETA');
        $email->setSubject('Confirmación de Registro');
        
        // El cuerpo del mensaje
        $mensaje = "
            Hola $nombre, gracias por registrarte
            Tu contraseña es: $password
            Por favor, haga clic en el siguiente enlace para registrar el o los cursos:
            <p><a href='". base_url() ."/reportes_cursos/public'>Confirmar mi cuenta</a>
        ";
        $email->setMessage($mensaje);

        // Enviar el correo
        if ($email->send()) {
            // Opcionalmente puedes redirigir a una página de éxito o mostrar un mensaje
            echo "Correo de confirmación enviado correctamente.";
        } else {
            // Mostrar errores en caso de fallo
            $data = $email->printDebugger(['headers']);
            print_r($data);
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
                        'c_rol' => $datosUsuario['cat_rol'],                        
                    ];

                    if ($datosSesion['c_rol'] == '2') {
                    $session = session();
                    $session->set($datosSesion);                    
                        return redirect()->to(base_url() . '/principal');
                        
                    } elseif ($datosSesion['c_rol'] == null) {
                        $session = session();
                        $session->set($datosSesion);
                        return redirect()->to(base_url() . '/principal');
                    }
                    
                } else {
                    $data['error'] = "Contraseña incorrecta.";  
                    echo view('login', $data);
                }
            } else {
                $data['error'] = "El usuario no existe.";
                echo view('login', $data);
            }
        } else {
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
