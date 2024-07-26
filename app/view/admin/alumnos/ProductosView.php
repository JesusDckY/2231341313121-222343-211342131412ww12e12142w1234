<div>
<table border="1">
        <thead>
            <tr>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Talla</td>
                <td>Stock</td>
                <td>Precio</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($datos as $producto){
                    echo "<tr>";
                    echo "<td>". $producto['Marca'] ."</td>";
                    echo "<td>". $producto['Modelo'] ."</td>";
                    echo "<td>". $producto['Talla'] ."</td>";
                    echo "<td>". $producto['Stock'] ."</td>";
                    echo "<td>". $producto['Precio'] ."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>