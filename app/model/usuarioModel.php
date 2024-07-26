<?php
    class usuarioModel{
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

        public function getCredentials($table, $user, $password){
            // Sanitizar el nombre de la tabla
            $allowedTables = ['clientes', 'empleado', 'admin']; // Lista de tablas permitidas
            if (!in_array($table, $allowedTables)) {
                return false;
            }
        
            // Construir la consulta con marcadores de posición
            $consulta = "SELECT * FROM $table WHERE correo = ? AND contra = ?";
            $conexion = $this->connection->getConnection();
            
            // Preparar la consulta
            if ($stmt = $conexion->prepare($consulta)) {
                // Vincular parámetros
                $stmt->bind_param('ss', $user, $password);
                // Ejecutar la consulta
                $stmt->execute();
                // Obtener resultados
                $resultado = $stmt->get_result();
                $respuesta = $resultado->num_rows >= 1 ? $resultado->fetch_assoc() : false;
                // Cerrar la declaración
                $stmt->close();
            } else {
                // Manejar errores de preparación de la consulta
                $respuesta = false;
            }
            
            $this->connection->closeConnection();
            return $respuesta;
        }
        
        
    }
?>