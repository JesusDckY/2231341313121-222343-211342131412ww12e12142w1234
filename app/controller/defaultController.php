<?php
    class defaultController{
        private $vista;

        public function index(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }
            $vista="app/view/admin/adminHomeView.php";
            if( isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
               include_once("app/view/admin/plantillaLOUTView.php");
            else
                include_once("app/view/admin/plantillaLOUTView.php");

        }
    }   
?>