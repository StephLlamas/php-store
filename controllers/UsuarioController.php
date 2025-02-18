<?php
require_once 'models/usuario.php';

class usuarioController{
    public function index() {
        echo "Controlador Usuarios, Acción Index";
    }
    
    public function registro() {
        require_once 'views/usuario/registro.php';
    }
    
    public function save() {
        
        if(isset($_POST)){
            
            $usuario = new Usuario();
            
            // Recogemos los datos del formulario
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            
            // Array de errores
            $errores = array();
            
            // VALIDAR LOS DATOS ANTES DE GUARDARLOS EN LA BASE DE DATOS

            // Validar campo nombre
            if (is_numeric($nombre) || preg_match("/[0-9]/", $nombre)){
                $errores['nombre'] = 'El nombre no es válido';
            }

            // Validar campo apellidos
            if (is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos)){
                $errores['apellidos'] = 'Los apellidos no son válidos';
            }

            // Validar campo email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errores['email'] = 'El email no es válido';
            }
            if($usuario->uniqueEmail($email)){
                $errores['email_unico'] = 'El email ya está en uso';
            }
            
            if(count($errores) == 0){
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $save = $usuario->save();
                
                if($save){
                    $_SESSION['register'] = 'complete';
                } else {
                    $_SESSION['register'] = 'failed';
                }
            } else {
                $_SESSION['errores'] = $errores;
            }
        }
        header("Location:".base_url.'usuario/registro');
    }
    
    public function login() {
        if(isset($_POST)){
            // Identificar al usuario
            // Consulta a la base de datos
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $identity = $usuario->login(); // Retorna un objeto usuario o false
            
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificación fallida';
            }
        }
        header("Location:".base_url);
    }
    
    public function logout() {
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        
        header("Location:".base_url);
    }
}

?>