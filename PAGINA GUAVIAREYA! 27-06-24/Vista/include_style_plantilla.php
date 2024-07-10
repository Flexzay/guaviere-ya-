<head>

    <?php

    if (
        $seccion == 'home' || $seccion == 'shop' || $seccion == 'comida' || $seccion == 'bebidas' ||
        $seccion == 'productos' || $seccion == 'carrito' || $seccion == 'tarjeta' || $seccion == 'productos2' ||
        $seccion == 'facturacion' || $seccion == 'confirmacion' || $seccion == 'ADMI_Shop_A' || $seccion == 'ADMI_Productos_A' ||
        $seccion == 'ADMI_Bebidas_A' || $seccion == 'ADMI_Bebida_A' || $seccion == 'ADMI_Comida_A' 
    ) {
    ?>
        <link rel="stylesheet" href="../css/styles.css" />
        <!-- box icons-->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
        <!-- link bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <!--font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"></svg>

        <!-- Scripts de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- Scripts de fontawesome -->
        <script src="https://kit.fontawesome.com/c8b5889ad4.js" crossorigin="anonymous"></script>


    <?php
    } else if ($seccion == 'perfil' || $seccion == 'Perfil_P' || $seccion == 'perfil_E' || $seccion == 'ADMI_Perfil_A'|| $seccion == 'Cambiar_clave') {
    ?>
        <link rel="stylesheet" href="../css/styles.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

        <!-- Scripts de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Scripts de fontawesome -->
        <script src="https://kit.fontawesome.com/c8b5889ad4.js" crossorigin="anonymous"></script>
    <?php
    } else  if ($seccion == 'registro' || $seccion == 'Olvidaste' || $seccion == 'Olvidaste2' || $seccion == 'login' || $seccion == 'ADMI_login_A' || $seccion=='terminos' || $seccion=='politicas') {
    ?>
    <link rel="stylesheet" href="../css/style3.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <?php
    } elseif ($seccion == 'ADMI_Agregar_P' || $seccion == 'ADMI_Agregar_B') {
    ?>
        <link rel="stylesheet" href="../css/styles.css" />
    <?php
    } elseif ($seccion == 'ADMI_Ordenes' || $seccion == 'ADMI_Horario2' || $seccion == 'ADMI_Horarios') {
    ?>
        <link rel="stylesheet" href="../css/styles.css" />
        <!-- Scripts de fontawesome -->
        <script src="https://kit.fontawesome.com/c8b5889ad4.js" crossorigin="anonymous"></script>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"></svg>
    <?php
    } elseif ($seccion == 'ADMI_Editar_A') {
    ?>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <?php
    } elseif ($seccion == 'ADMI_Productos_A' || $seccion == 'ADMI_Bebidas_A' || $seccion == 'ADMI_Shop_A' || $seccion == 'bebidas' || $seccion == 'comida' || $seccion =='productos')
    ?>
    <link rel="stylesheet" href="../css/style2.css">


</head>