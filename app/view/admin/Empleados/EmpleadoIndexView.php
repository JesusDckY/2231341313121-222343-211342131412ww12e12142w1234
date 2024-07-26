<div>
    <h1>Admin </h1>
    <h3>Hola!!!! <?= $nombre ?></h3>
    <p style="text-align: center;">
       Bienvenido a la seccion de Administradores, en esta seccion podras administrar las ventas y los producto que esten disponibles en el almacen.
    </p>
    <p>
       
    </p>
<img src="./ccdc1ea308006cee71d24dfbcc3bd5e5.jpg" alt="" width="500px" height="500ppx">

    <table border="1">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Edad</td>
                <td>Email</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($datos as $dato){
                    echo "<tr>";
                    echo "<td>". $dato['Nombre'] ."</td>";
                    echo "<td>". $dato['Apaterno'] ."</td>";
                    echo "<td>". $dato['edad'] ."</td>";
                    echo "<td>". $dato['correo'] ."</td>";
                    echo "<td> 
                        <button onclick='editar(". $dato['idempleado'] .")' >Editar</button> 
                        <button onclick='eliminar(". $dato['idempleado'] .")' >Eliminar</button> </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <script>
        function editar(id){
            window.location.href="http://localhost/php-3c?C=EmpleadoController&M=callEdditForm&id="+id;
        }

        function eliminar(id){
            if(confirm("Realmente quieres eliminar al registro "+id+"?")){
                window.location.href="http://localhost/php-3c?C=EmpleadoController&M=delete&id="+id;
            }
        }
    </script>
</div>