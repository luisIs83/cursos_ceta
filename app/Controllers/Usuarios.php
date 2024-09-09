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
            'usuario' => [      
            'rules' => 'required|is_unique[usuarios.usuario]',
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
            ]
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

        if ($users != null) {
            echo view('relacion/relacion', $data);
        } else{
            echo view('usuarios/nuevo', $data);
        }
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

        $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->inser([
                'usuario' => $this->request->getPost('usuario'),
                'email' => $this->request->getPost('email'),
                'ap_paterno' => $this->request->getPost('ap_paterno'),
                'ap_materno' => $this->request->getPost('ap_materno'),
                'nombre' => $this->request->getPost('nombre'),
                'cat_genero' => $this->request->getPost('cat_genero'),
                'cat_categoria' => $this->request->getPost('cat_categoria'),
                'cat_carrera' => $this->request->getPost('cat_carrera'),
                'num_celular' => $this->request->getPost('num_celular'),
                'cat_dependencia' => $this->request->getPost('cat_dependencia'),
                'password' => $hash,
                'cat_rol' => $this->request->where->getPost('cat_rol') 
            ]);

        $idUsuarioReg = $this->usuarios->getInsertID();

        $this->opcionales->insert([
            'op_uno' => $this->request->getPost('op_uno'),
            'op_dos' => $this->request->getPost('op_dos'),
            'op_tres' => $this->request->getPost('op_tres'),
            'op_cuatro' => $this->request->getPost('op_cuatro'),
        ]);

        $idOpcionalesReg = $this->opcionales->getInsertID();

            $this->relacion->save([
                'fk_usuarios' => $idUsuarioReg,
                'fk_opcionales' => $idOpcionalesReg,
                'fk_nom_curso' => $this->request->getPost('nombre_curso')
            ]);

            $this->enviarCorreoConfirmacion($email, $nombre);

        return redirect()->to(base_url());
        } else {
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
        //$data = ['titulo' => 'Profesor', 'validation' => $this->validator];
        //echo view('header');
        echo view('usuarios/nuevo', $data);
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
                        return redirect()->to(base_url() . '/reportes');
                        
                    } elseif ($datosSesion['c_rol'] == '1') {
                        $session = session();
                        $session->set($datosSesion);
                        return redirect()->to(base_url() . '/carreras');
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
