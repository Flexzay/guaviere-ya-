<?php
// Define las fechas del evento
$eventoInicio = new DateTime('2024-07-01');
$eventoFin = new DateTime('2024-07-31'); // Ajusta según la duración del evento
$fechaActual = new DateTime();

$eventoEnCurso = ($fechaActual >= $eventoInicio && $fechaActual <= $eventoFin);

// Define la sección actual (esto debería ser dinámico en función del archivo o URL)
$seccion = isset($seccion) ? $seccion : 'home';

// Determina el archivo CSS a incluir basado en si el evento está en curso o no
$cssFile = $eventoEnCurso ? '../css/evento.css' : '../css/styles.css';
?>

<head>

    <?php

    if (
        $seccion == 'comida' || $seccion == 'bebidas' ||
        $seccion == 'productos' || $seccion == 'carrito' || $seccion == 'tarjeta' || $seccion == 'pago' ||
        $seccion == 'facturacion' || $seccion == 'confirmacion' || $seccion == 'ADMI_Productos_A' ||
        $seccion == 'ADMI_Bebidas_A' || $seccion == 'ADMI_Bebida_A' || $seccion == 'ADMI_Comida_A' || $seccion == 'SUPER_add' || $seccion == 'SUPER_add_administrador' ||
        $seccion == 'Perfil_Restaurantes' || $seccion == 'verificacion'
    ) {
    ?>
        <link rel="stylesheet" href="<?php echo $cssFile; ?>" />
        <link rel="stylesheet" href="../css/style2.css">

        <!-- box icons-->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

        <!-- link bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!--font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"></svg>

        <!-- Scripts de fontawesome -->
        <script src="https://kit.fontawesome.com/c8b5889ad4.js" crossorigin="anonymous"></script>

        <!-- Scripts de Jqery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <link rel="stylesheet" href="path/to/bootstrap.min.css"> <!-- Asegúrate de incluir el archivo de Bootstrap -->
        <script src="path/to/jquery.min.js"></script> <!-- Asegúrate de incluir jQuery -->
        <script src="path/to/bootstrap.bundle.min.js"></script> <!-- Asegúrate de incluir Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <?php
    } else if ($seccion == 'perfil' || $seccion == 'Perfil_P' || $seccion == 'perfil_E' || $seccion == 'ADMI_Perfil_A' || $seccion == 'Cambiar_clave' || $seccion == 'pedidos_per' || $seccion == 'ADMI_Editar_A' || $seccion == 'ADMI_CambiarPass' || $seccion == 'Perfil_Direcciones' || $seccion == 'Perfil_SuperAdmi' || $seccion == 'CambiarClave_SuperAdmi' || $seccion == 'Estadisticas') {
    ?>
        <link rel="stylesheet" href="../css/style3.css" />
        <link rel="stylesheet" href="<?php echo $cssFile; ?>" />

        <!-- link bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://kit.fontawesome.com/c8b5889ad4.js" crossorigin="anonymous"></script>

    <?php
    } else  if ($seccion == 'registro' || $seccion == 'Olvidaste' || $seccion == 'Olvidaste2' || $seccion == 'login' || $seccion == 'ADMI_login_A' || $seccion == 'terminos' || $seccion == 'politicas') {
    ?>
        <!-- SCRIPT DEL CAPTCHA-->
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/style3.css" />
        <!-- BOADSTRAP-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




    <?php
    } elseif ($seccion == 'ADMI_Agregar_P' || $seccion == 'ADMI_editar_Producto') {
    ?>
        <link rel="stylesheet" href="<?php echo $cssFile; ?>" />
        <!-- BOADSTRAP-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    } elseif ($seccion == 'ADMI_Ordenes' || $seccion == 'ADMI_Horario2' || $seccion == 'ADMI_Horarios') {
    ?>
        <link rel="stylesheet" href="../css/style_prueba.css" />
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

        <!-- BOADSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Scripts de fontawesome -->
        <script src="https://kit.fontawesome.com/c8b5889ad4.js" crossorigin="anonymous"></script>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"></svg>
        <!-- Links para convertir -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.6/xlsx.full.min.js"></script>

    <?php
    } elseif ($seccion == 'ADMI_Editar_A') {
    ?>
        <link rel="stylesheet" href="<?php echo $cssFile; ?>" />
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <?php
    } elseif ( $seccion == 'comida'|| $seccion == 'ADMI_Productos_A' || $seccion == 'ADMI_Bebidas_A' || $seccion == 'bebidas'  || $seccion == 'productos' || $seccion == 'Perfil_Restaurantes') {
    ?>
        <link rel="stylesheet" href="../css/style2.css">
        <!-- link bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    } elseif ($seccion == 'home' || $seccion == 'shop' || $seccion == 'ADMI_Shop_A' || $seccion == 'SuperAdmin_Panel') {
    ?>
        <!-- Vendor CSS Files -->
        <link href="../css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <!-- Main CSS File -->
        <link href="../css/main.css" rel="stylesheet">
        <!-- ICONOS FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <!-- box icons-->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <?php

    }
    ?>

</head>
