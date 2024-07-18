<!DOCTYPE html>
<html lang="en">

<head>
    <title>GuaviareYa!</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12 ico-carro">
            <a href="controlador.php?seccion=comida"><i class="fa-solid fa-circle-arrow-left"></i></a>
        </div>
        <div class="subcontainer3">
            <div class="row">
                <div class="col-md-12 carrito">
                    <h3 class="name-ca">Tu Carrito</h3>
                </div>
            </div>

            <?php
            // Incluir archivo mostrar_productos.php
            include('../Modelos/mostrar_productos.php');

            // Crear instancia de la clase mostrar_productos
            $mostrarProductos = new mostrar_productos();

            // Inicializar el nombre del restaurante
            $nombre_restaurante = '';

            // Obtener el ID del restaurante de la URL si está disponible
            if (isset($_GET['id_restaurante'])) {
                $id_restaurante = $_GET['id_restaurante'];

                // Obtener el nombre del restaurante
                $nombre_restaurante = $mostrarProductos->obtenerNombreRestaurante($id_restaurante);
            }

            // Verificar si el carrito está vacío o no existe
            if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
                echo '<div class="row"><div class="col-md-12"><h3 class="name-car">Tu carrito está vacío</h3></div></div>';
            } else {
                $subtotal = 0;
                foreach ($_SESSION['carrito'] as $key => $producto) {
                    // Calcular subtotal
                    $subtotal += $producto['Valor_P'] * $producto['cantidad'];

                    // Obtener el nombre del restaurante del producto
                    $nombreRestaurante = isset($producto['Nombre_R']) ? $producto['Nombre_R'] : $nombre_restaurante;

                    // Mostrar producto en el carrito
                    echo '
                    <div class="row carrito" data-id="' . $producto['ID_Producto'] . '">
                        <div class="col-md-2">
                            <p>Restaurante: ' . htmlspecialchars($nombreRestaurante) . '</p> 
                            <img src="../media_productos/' . htmlspecialchars($producto['img_P']) . '" alt="' . htmlspecialchars($producto['Nombre_P']) . '" width="100px">
                        </div>
                        <div class="col-md-5">
                            <p>' . htmlspecialchars($producto['Descripcion']) . '</p>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="cantidad" min="1" max="20" value="' . $producto['cantidad'] . '" class="cantidad" data-id="' . $producto['ID_Producto'] . '">
                        </div>
                        <div class="col-md-3 precio">
                            <p class="precio-unitario" data-precio="' . $producto['Valor_P'] . '">COP ' . number_format($producto['Valor_P'], 0, ',', '.') . '</p>
                            <a href="controlador_eliminar_procarrito.php?id_producto=' . $producto['ID_Producto'] . '"><i class="fa-solid fa-trash" style="color: orange; font-size: 25px;"></i></a>
                        </div>
                    </div>';
                }

                // Mostrar subtotal
                echo '
                <div class="row">
                    <div class="col-md-12 subtotal">
                        <h3 class="name-car">SUBTOTAL</h3>
                        <p class="valor" id="subtotal" style="font-weight: bold;">COP ' . number_format($subtotal, 0, ',', '.') . '</p>
                    </div>
                </div>';
            }
            ?>

            <div class="row">
                <div class="col-md-12">
                    <a href="controlador.php?seccion=tarjeta"><button class="btn-pagar">Pagar</button></a>
                </div>
            </div>
        </div>
    </div>

    <script src="../JS/actualizar_carrito.js"></script>
</body>

</html>
