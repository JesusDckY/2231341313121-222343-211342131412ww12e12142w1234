<?php
    //las rutas de nuestra app localhost/PHP/
    //la ruta tendra dos elementos C(controlador) y M(metodo)
    //ruta completa localhost/php-3c?C=alumnoController&M=index 
    define("controlador","app/controller/");
    //verificamos la existencia de la variable C en la ruta
    $control= isset($_GET['C'])? $_GET['C']:'';
    //armamos la ruta
    $ruta=controlador. $control .".php";
    //verificamos que el archivo almacenado en la ruta exista
    if(is_file($ruta)){
        require_once($ruta);
        $objeto=new $control();
        $metodo= isset($_GET['M'])? $_GET['M']:'';

        if(method_exists($objeto,$metodo)){
            $objeto -> $metodo();
        }
    }else{
        require_once("app/controller/defaultController.php");
        $default= new defaultController();
        $default->index();
    }

?>