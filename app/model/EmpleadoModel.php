<?php
class EmpleadoModel{
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
        $consulta="SELECT * FROM empleado";
        //Paso 2 : Conectamos con la base de datos 
        $coneccion= $this->connection->getConnection();
        //paso 3 : ejecutar la consulta 
        $resultado= $coneccion->query($consulta);
        //paso 4: preparar mi resultado
        //crear un arreglo para almacenar todos los registros 
        $empleados=array();
        //recorremos el dataset para ir sacando los registros 
        while($empleado=$resultado->fetch_assoc()){
            $empleados[]=$empleado;
        }
        //Paso 5 :cerramos la coneccion 
        $this->connection->closeConnection();
        //paso 6 : Arrojar resultados
        return $empleados;
    }
    public function insert($data){
        if(!isset($data['nombre'],$data['apellido'],$data['edad'],$data['correo'],$data['fecha'])){
            return false;
        }
        
        $nombre=$data['nombre'];
        $apellido=$data['apellido'];
        $edad=$data['edad'];
        $correo=$data['correo'];
        $fecha=$data['fecha'];

        $consulta="INSERT INTO alumnos (nombre, apellido, edad, correo_electronico,fecha_nacimiento)
        VALUES ('$nombre', '$apellido', $edad, '$correo', '$fecha')";
        $coneccion=$this->connection->getConnection();
        $resultado=$coneccion->query($consulta);
        $respuesta=$resultado?true:false;
        $this->connection->closeConnection();
        return $respuesta;
    }
}
?>