<?php
    // Cargar las clases antes de iniciar la sesión
    include_once 'Model/Cliente.php';
    include_once 'Model/Producto.php';
    include_once 'Model/Factura.php';

    session_start();

    // Verifica si el cliente está en la sesión
    if (!isset($_SESSION["cliente"])) {
        header("Location: index.php"); // Redirige si no hay cliente
        exit();
    }

    // Recuperar el cliente de la sesión
    $clienteData = $_SESSION["cliente"];
    
    // Crea una instancia de Cliente con los datos guardados en la sesión
    $cliente = new Cliente($clienteData->getNombre(), $clienteData->getEmail());

    // Verifica si los productos están en la sesión
    $productos = isset($_SESSION["productos"]) ? $_SESSION["productos"] : [];

    // Crea una instancia de Factura
    $factura = new Factura($cliente);

    // Agrega los productos a la factura
    foreach ($productos as $productoData) {
        // Asegúrate de crear una nueva instancia de Producto con los datos deserializados
        $producto = new Producto($productoData->getNombre(), $productoData->getPrecio());
        $factura->agregarProducto($producto);
    }

    //$factura->generarFactura();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/factura.css">
    <title>Factura</title>
</head>
<body>

<div class="invoice-container">
    <h1>Factura</h1>
    
    <div class="customer-info">
        <h2>Datos del Cliente</h2>
        <p><strong>Nombre:</strong> <?php echo $cliente->getNombre(); ?></p>
        <p><strong>Correo:</strong> <?php echo $cliente->getEmail(); ?></p>
    </div>

    <div class="product-list">
        <h2>Productos</h2>
        <ul>
        <?php foreach ($productos as $producto){ ?>
                <li>
                    <strong><?php echo $producto->getNombre(); ?>:</strong> Precio: S/ <?php echo number_format($producto->getPrecio(), 2); ?>
                </li>
        <?php }; ?>
        </ul>
    </div>

    <div class="total">
        <h2>Total: S/ <?php echo number_format($factura->calcularTotal(), 2); ?></h2>
    </div>

    <div class="footer">
        <p>Gracias por su compra!</p>
    </div>

    <div class="back-button">
        <form action="index.php" method="get">
            <input type="submit" value="Regresar" style="margin-top: 20px; background-color: darkred; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
        </form>
    </div>
</div>

</body>
</html>
