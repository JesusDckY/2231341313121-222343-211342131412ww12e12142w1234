<div>
    <h1>Formulario de logeo</h1>
    <form action="http://localhost/StrangerSneakers/?C=usuarioController&M=login" method="post">
        <div>
            <label for="tipo">Selecciona el Usuario</label>
            <select name="tipo">
                <option value="clientes">Cliente</option>
                <option value="empleado">Administrador</option>
            </select>
        </div>
        <div>
            <label for="user">Correo</label>
            <input type="text" name="user" placeholder="Correo">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <input type="submit" value="Login">
    </form>
</div>