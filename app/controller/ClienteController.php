<?php
    //incluimos el modelo para poder instancialrlo dentro del controlaxor 
    include_once("app/model/ClienteModel.php");
    class ClienteController{
        //creamos un atributo para referenciar al modelo del alumno
        private $Cliente;

        public function index(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }

            if( isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                //instanciamos el modelo de alumno
                $this->Cliente= new ClienteModel();
                //obtenemos la informacion a trabajar dentro de la vista 
                $datos = $this->Cliente->getAll();
                $nombre=$_SESSION['name'];
                //definimos la vista a mostrar dentro de la plantilla
                $vista= "app/view/admin/alumnos/ClienteIndexView.php";
                //incluimos la plantilla
                include_once("app/view/admin/plantillaClienteview.php");
            } else{
                header("location:http://localhost/StrangerSneakers/");
            }
        }

        public function callInsertForm(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                $vista="app/view/admin/alumnos/InsertFormView.php";
                include_once("app/view/admin/plantillaClienteView.php");
            }else{
                header("location:http://localhost/StrangerSneakers/");
            }
        }
        
        public function insert(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(!isset($_POST['Nombre'],$_POST['Apaterno'],$_POST['edad'],$_POST['correo'],$_POST['fecha'])){
                    header("location:http://localhost/StrangerSneakers");
                }
                $data=array(
                    'nombre'=>$_POST['Nombre'],
                    'apellido'=>$_POST['Apaterno'],
                    'edad'=>$_POST['edad'],
                    'correo'=>$_POST['correo'],
                    'fecha'=>$_POST['fecha']
                );
                $alumno= new ClienteModel();
                $resultado=$alumno->insert($data);
                if($resultado){
                    header("location:http://localhost/StrangerSneakers/?C=ClienteController&M=index");
                }else{
                    header("location:http://localhost/StrangerSneakers");
                }
            }
        }

        public function callEdditForm(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                if($_SERVER['REQUEST_METHOD']=='GET'){
                    $id=$_GET['id'];
                    $this->Cliente=new ClienteModel();
                    $data = $this->Cliente->getById($id);
                    $vista="app/view/admin/alumnos/edditForm.php";
                    include_once("app/view/admin/plantillaClienteView.php");
                }
            }else{
                header("location:http://localhost/StrangerSneakers");
            }
            
        }

        public function eddit(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $dato=array(
                    'id'=>$_POST['id'],
                    'nombre'=>$_POST['nombre'],
                    'apellido'=>$_POST['apellido'],
                    'edad'=>$_POST['edad'],
                    'correo'=>$_POST['correo'],
                    'fecha'=>$_POST['fecha'],
                );
                $this->Cliente= new ClienteModel();
                $respuesta=$this->Cliente->eddit($dato);
                if($respuesta){
                    header("location:http://localhost/php-3c/?C=alumnoController&M=index");
                }else{
                    header("location:http://localhost/php-3c");
                }

            }
        }

        public function delete(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $id=$_GET['id'];
                $this->Cliente=new ClienteModel();
                $respuesta=$this->Cliente->delete($id);
                if($respuesta){
                    header("location:http://localhost/php-3c/?C=alumnoController&M=index");
                }else{
                    header("location:http://localhost/php-3c");
                }
            }
        }

    }

?>
