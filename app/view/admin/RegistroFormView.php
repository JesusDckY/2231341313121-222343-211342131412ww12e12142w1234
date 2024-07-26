<div>
    <h1>Formulario de Registro</h1>
    <form action="http://localhost/StrangerSneakers/?C=usuarioController&M=login" method="post">
        <div>
            <label for="Name">Nombre: </label>
            <input type="text" name="Name" placeholder="Ej. Luis">
        </div>
        <div>
            <label for="AP">Apellido Paterno: </label>
            <input type="text" name="AP" placeholder="Ej. Martinez">
        </div>
        <div>
            <label for="AM">Apellido Materno: </label>
            <input type="text" name="AM" placeholder="Ej. Hernandez">
        </div>
        <div>
            <label for="edad">Edad: </label>
            <input type="number" name="edad" placeholder="Ej. 18">
        </div>
        <div>
            <label for="Tel">Telefono: </label>
            <input type="text" name="Tel" placeholder="Ej. 7723648921">
        </div>
        <div>
            <label for="Correo">Correo: </label>
            <input type="text" name="Correo" placeholder="Ej. eriskire@gmail.com">
        </div>
        <div>
            <label for="contra">Contraseña: </label>
            <input type="text" name="contra" placeholder="*****">
        </div>
        <div>
            <label for="user">Confirmar Contraseña: </label>
            <input type="text" name="user" placeholder="******">
        </div>
        <input type="submit" value="Siguiente">
    </form>
</div>