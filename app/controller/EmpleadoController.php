<?php
    //incluimos el modelo para poder instancialrlo dentro del controlaxor 
    include_once("app/model/EmpleadoModel.php");
    class EmpleadoController{
        //creamos un atributo para referenciar al modelo del alumno
        private $Empleado;

        public function index(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }

            if( isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                //instanciamos el modelo de alumno
                $this->Empleado= new EmpleadoModel();
                //obtenemos la informacion a trabajar dentro de la vista 
                $datos = $this->Empleado->getAll();
                $nombre=$_SESSION['name'];
                //definimos la vista a mostrar dentro de la plantilla
                $vista= "app/view/admin/Empleados/EmpleadoIndexView.php";
                //incluimos la plantilla
                include_once("app/view/admin/plantillaEmpleadoView.php");
            } else{
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
    }
?>