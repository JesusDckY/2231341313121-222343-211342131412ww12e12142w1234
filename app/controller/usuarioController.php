<?php
include_once("app/model/usuarioModel.php");

class usuarioController{
    private $usuario;

    public function callRegistroForm(){
        if(session_status()===PHP_SESSION_NONE){
            session_start();
        }
        $vista="app/view/admin/RegistroFormView.php";
        if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
            include_once("app/view/admin/plantillaLOUTView.php");
        else
            include_once("app/view/admin/plantillaLOUTView.php");
    }

    public function callLoginForm(){
        if(session_status()===PHP_SESSION_NONE){
            session_start();
        }
        $vista="app/view/admin/loginFormView.php";
        if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
            include_once("app/view/admin/plantillaLOUTView.php");
        else
            include_once("app/view/admin/plantillaLOUTView.php");
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $table = $_POST['tipo'];
            $user = $_POST['user'];
            $password = $_POST['password'];
            $this->usuario = new usuarioModel();
            $respuesta = $this->usuario->getCredentials($table, $user, $password);
            
            if ($respuesta) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                
                $_SESSION['logedin'] = true;
                $_SESSION['name'] = $respuesta['Nombre'] . " " . $respuesta['Apaterno'];
    
                // Incluir el controlador adecuado basado en la tabla
                switch ($table) {
                    case 'clientes':
                        include_once("app/controller/ClienteController.php");
                        $Controller = new ClienteController();
                        break;
                    case 'empleado':
                        include_once("app/controller/EmpleadoController.php");
                        $Controller = new EmpleadoController();
                        break;
                    default:
                        die("Tipo de usuario no válido.");
                }
    
                $Controller->index();
            } else {
                $vista = "app/view/admin/errorView.php";
                include_once("app/view/admin/plantillaLOUTView.php");
            }
        }
    }    
    

    public function logedout(){
        if(session_status()===PHP_SESSION_NONE){
            session_start();
            $_SESSION['logedin']=false;
            //session_abort();
            //session_destroy();
            header("location:http://localhost/StrangerSneakers/");
        }

    }
}
?>