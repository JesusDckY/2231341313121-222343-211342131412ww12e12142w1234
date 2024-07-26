<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STRANGER</title>
    <link rel="stylesheet" href="app/view/style.css">

</head>
<body>
    <header class="header">
        <h1>STRANGER SNEAKERS</h1>
        <nav class="navbar">
            <ul>
                <li><a href="http://localhost/StrangerSneakers">Inicio</a></li>
                <li><a href="http://localhost/StrangerSneakers?C=usuarioController&M=callLoginForm">Productos</a></li>
                <li><a href="http://localhost/StrangerSneakers?C=usuarioController&M=callRegistroForm">Registrarse</a></li>
                <li><a href="http://localhost/StrangerSneakers?C=usuarioController&M=callLoginForm">Login</a></li>
            </ul>
        </nav>
    </header>
    <section class="container">
        <?php include_once($vista); ?>
    </section>
    <footer class="footer">
        <h4>Equipo 2</h4>
        <h4>3° "C"</h4>
    </footer>
</body>
</html>