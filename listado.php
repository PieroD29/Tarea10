<?php

include_once 'Model/Cliente.php';
include_once 'Model/Producto.php';
include_once 'Model/Factura.php';

session_start();

$cliente = null;
$productos = [];

$control1 = isset($_POST["cNombre"]) && isset($_POST["cEmail"]);
$control2 = isset($_POST["pNombre"]) && isset($_POST["pPrecio"]);
$control3 = isset($_SESSION["productos"]);

if ($control1) {
    $clienteNombre = $_POST["cNombre"];
    $clienteEmail = $_POST["cEmail"];
    
    $_SESSION["cliente"] = new Cliente($clienteNombre, $clienteEmail);
    $_SESSION['productos'] = [];
}

if (isset($_SESSION["cliente"])) {
    $cliente = $_SESSION["cliente"];
}

if ($control2) {
    $nombreProducto = $_POST["pNombre"];
    $precioProducto = $_POST["pPrecio"];

    if (!($control3)) {
        $_SESSION["productos"] = [];
    }

    if ( $precioProducto >= 1 ) $_SESSION["productos"][] = new Producto($nombreProducto, $precioProducto);
}

$productos = isset($_SESSION["productos"]) ? $_SESSION["productos"] : [];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/listado.css">
    <title>Producto y Cliente</title>
</head>
<body>

<div class="container">
    <!-- Columna izquierda: Formulario -->
    <div class="form-column">
        <h1>Agregar Producto</h1>
        <form action="" method="POST">
            <label for="nombre">Nombre del Producto:</label> 
            <input type="text" id="pNombre" name="pNombre">

            <label for="precio">Precio del Producto (S/):</label>
            <input type="number" id="pPrecio" name="pPrecio" step="0.01">

            <input type="submit" value="Guardar Producto">
        </form>
        <div>
            <form action="index.php" method="get">
                <input type="submit" value="Regresar" style="margin-top: 20px; background-color: darkred;">
            </form>
        </div>
    <?php   if ($control2){?>
        <div>
            <form action="generarFactura.php" method="get">
                <input type="submit" value="Generar Factura" style="margin-top: 20px; background-color: green;">
            </form>
        </div>
    <?php   }?>
    </div>

    <!-- Columna derecha: Listado de productos y datos del cliente -->
    <div class="list-column">
        <h1>Listado de Productos</h1>
        <div class="customer-info">
            <strong>Datos del Cliente</strong>
            <p>Nombre: <?php if ($cliente) echo $cliente->getNombre(); ?></p>
            <p>Correo: <?php if ($cliente) echo $cliente->getEmail(); ?></p>
        </div>

        <ul class="product-list">

        <?php   if (empty($productos)){ ?>
                <li>No hay productos agregados.</li>
        <?php   } else {
                    foreach ($productos as $producto){ ?>
                        <li>
                            <strong><?php echo $producto->getNombre(); ?>:</strong>
                            Precio: S/ <?php echo number_format($producto->getPrecio(), 2); ?>
                        </li>  
        <?php       }
                } ?>

        </ul>

    </div>
</div>

</body>
</html>
