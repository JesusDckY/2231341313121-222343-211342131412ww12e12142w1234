<?php
class ClienteModel{
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
        $consulta="SELECT * FROM clientes";
        //Paso 2 : Conectamos con la base de datos 
        $coneccion= $this->connection->getConnection();
        //paso 3 : ejecutar la consulta 
        $resultado= $coneccion->query($consulta);
        //paso 4: preparar mi resultado
        //crear un arreglo para almacenar todos los registros 
        $alumnos=array();
        //recorremos el dataset para ir sacando los registros 
        while($alumno=$resultado->fetch_assoc()){
            $alumnos[]=$alumno;
        }
        //Paso 5 :cerramos la coneccion 
        $this->connection->closeConnection();
        //paso 6 : Arrojar resultados
        return $alumnos;
    }

    public function getById($id){
        //paso 1
        $consulta="SELECT * FROM alumnos WHERE id_alumno = $id";
        //paso 2
        $coneccion = $this->connection->getConnection();
        //paso 3 
        $resultado = $coneccion->query($consulta);
        //paso 4
        if($resultado && $resultado->num_rows > 0){
            $alumno= $resultado->fetch_assoc();
        }else{
            $alumno=false;
        }
        //paso 5
        $this->connection->closeConnection();
        //paso 6
        return $alumno;
    }

    public function delete($id){
        $consulta="DELETE FROM alumnos WHERE id_alumno= $id";
        $coneccion=$this->connection->getConnection();
        $resultado= $coneccion->query($consulta);
        $respuesta= $resultado ? true:false;
        $this->connection->closeConnection();
        return $respuesta;
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

    public function eddit($dato){
        if(!isset($dato['id'], $dato['nombre'], $dato['apellido'], $dato['edad'], $dato['correo'], $dato['fecha'])){
            return false;
        }

        $id=$dato['id'];
        $nombre=$dato['nombre'];
        $apellido=$dato['apellido'];
        $edad=$dato['edad'];
        $correo=$dato['correo'];
        $fecha=$dato['fecha'];

        $consulta="UPDATE alumnos SET nombre='$nombre', apellido='$apellido', 
        edad=$edad, correo_electronico='$correo', fecha_nacimiento='$fecha' WHERE id_alumno=$id";
        $coneccion=$this->connection->getConnection();
        $resultado=$coneccion->query($consulta);
        $respuesta=$resultado?true:false;
        $this->connection->closeConnection();
        return $respuesta;
    }
}
?>