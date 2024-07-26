<?php
class ProductoModel{
    //creamos un atributo para conectar con la base de datos
    private $connection;

    //definimos el contructor para la clase 
    public function __construct()
    {
        //requerimos acceso a la clase coneccion 
        require_once("app/config/DBConnection.php");
        //instanciamos la coneccion a la base de datos en $connection
        $this->connection= new DBConnection();
    }

    //creamos el metodo para obtener la lista de alumnos de nuestra base de datos 
    public function getAll(){
        //Paso 1 : Creamos la consulta 
        $consulta="SELECT * FROM productos";
        //Paso 2 : Conectamos con la base de datos 
        $coneccion= $this->connection->getConnection();
        //paso 3 : ejecutar la consulta 
        $resultado= $coneccion->query($consulta);
        //paso 4: preparar mi resultado
        //crear un arreglo para almacenar todos los registros 
        $Productos=array();
        //recorremos el dataset para ir sacando los registros 
        while($producto=$resultado->fetch_assoc()){
            $Productos[]=$producto;
        }
        //Paso 5 :cerramos la coneccion 
        $this->connection->closeConnection();
        //paso 6 : Arrojar resultados
        return $Productos;
    }
}
?>