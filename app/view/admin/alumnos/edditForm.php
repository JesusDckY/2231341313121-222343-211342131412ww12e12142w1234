<div>
    <h1>Editar el registro de <?= $data['nombre'] ?> <?= $data['apellido']?> </h1>

    <form action="http://localhost/StrangerSneakers/?C=ClienteController&M=eddit" method="post">
        <input type="hidden" name="id" value=<?= $data['id_alumno']?>>
        <div>
            <label for="nombre">Nombre : </label>
            <input type="text" name="nombre" required value=<?= $data['nombre']?>>
        </div>
        <div>
            <label for="apellido">Apellido : </label>
            <input type="text" name="apellido" required value=<?= $data['apellido']?>>
        </div>
        <div>
            <label for="edad">Edad : </label>
            <input type="number" name="edad" required value=<?= $data['edad']?>>
        </div>
        <div>
            <label for="correo">Correo : </label>
            <input type="email" name="correo" required value=<?= $data['correo_electronico']?>>
        </div>
        <div>
            <label for="fecha">Fecha : </label>
            <input type="date" name="fecha" required value=<?= $data['fecha_nacimiento']?>>
        </div>
        <div>
            <input type="submit" value="EDDIT">
        </div>
    </form>
</div>