<?php
    //incluimos el modelo para poder instancialrlo dentro del controlaxor 
    include_once("app/model/ProductoModel.php");
    class ProductoController{
        //creamos un atributo para referenciar al modelo del alumno
        private $Producto;

        public function index(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }

            if( isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                //instanciamos el modelo de alumno
                $this->Producto= new ProductoModel();
                //obtenemos la informacion a trabajar dentro de la vista 
                $datos = $this->Producto->getAll();
                $nombre=$_SESSION['name'];
                //definimos la vista a mostrar dentro de la plantilla
                $vista= "app/view/admin/alumnos/ProductosView.php";
                //incluimos la plantilla
                include_once("app/view/admin/plantillaClienteview.php");
            } else{
                header("location:http://localhost/StrangerSneakers/");
            }
        }
    }
?>