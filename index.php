<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Cliente</title>
</head>
<body>

    <div class="container">
        <h1>Formulario de Cliente</h1>
        <form action="listado.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="cNombre" name="cNombre">

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="cEmail" name="cEmail">

            <input type="submit" value="Enviar">
        </form>
        <div class="footer">
            <p>Todos los campos son obligatorios</p>
        </div>
    </div>

</body>
</html>
