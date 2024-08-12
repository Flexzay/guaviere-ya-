<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!isset($_SESSION['correo']) || $_SESSION['correo'] == "") {
    header("location: ../Controladores/controlador.php?seccion=login");
    exit();
}

// Incluir el archivo del modelo
include '../Modelos/DataAdmi.php';

// Obtener la información del usuario desde la base de datos
$user = DataAdmi::getUserByEmail($_SESSION['correo']);
$imgUrl = $user['img_R']; // Esta ahora es la URL de la imagen del restaurante

// Asignar ID_Restaurante a la sesión
$_SESSION['ID_Restaurante'] = $user['ID_Restaurante'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TU PERFIL</title>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <?php
                if (isset($_GET['error'])) {
                    $error_message = '';
                    switch ($_GET['error']) {
                        case '1':
                            $error_message = 'Error al subir la foto, o no se encontró foto de perfil.';
                            break;
                        default:
                            $error_message = 'Error desconocido.';
                            break;
                    }
                    echo "<div class='alert alert-danger' role='alert'>$error_message</div>";
                }
                ?>
            </div>
        </div>
        <div class="col-md-12 ico-footer">
            <a href="controlador.php?seccion=ADMI_Shop_A"><i class="fa-solid fa-circle-arrow-left"
                    style="color: #000000;"></i></a>
        </div>
        <div class="main-body">
            <h4 class="text-center mb-4">TU RESTAURANTE</h4>

            <!-- /Migajas de pan -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <form action="Controlador_AdmiSwitch.php" method="POST">
                                <input type="hidden" name="estado" value="Cerrado">
                                <label class="switch">
                                    <input type="checkbox" name="estado" value="Abierto" <?php echo $user['Estado'] === 'Abierto' ? 'checked' : ''; ?>>
                                    <span class="slider round"></span>
                                </label>
                           
                                <input type="hidden" name="id_restaurante"
                                    value="<?php echo htmlspecialchars($user['ID_Restaurante']); ?>">
                                <button type="submit" class="btn btn-primary mt-3">Estado</button>
                            </form>
                            <br>
                            <!-- Mostrar la imagen del restaurante -->
                            <div style="height: 140px; width: 140px; margin: 0 auto;">
                                <?php if ($user['img_R']): ?>
                                    <img src="<?php echo htmlspecialchars($user['img_R']); ?>" alt="Foto de perfil"
                                        class="img-fluid rounded-circle" style="height: 140px; width: 140px;">
                                <?php else: ?>
                                    <p>No se ha encontrado ninguna foto de perfil.</p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="mt-3 file-upload">
                                <form method="POST" action="Controlador_FotoAdmi.php" enctype="multipart/form-data">
                                    <label for="img_U" class="file-upload-icon">
                                        <i class="fas fa-upload"></i>
                                    </label>
                                    <br>
                                    <input type="file" id="img_U" name="img_U" accept="image/*"> 
                                    <button type="submit" class="btn btn-primary mt-2">Aceptar</button>
                                </form>
                            </div>

                            <div class="mt-3">
                                <p class="text-secondary mb-1"><?php echo htmlspecialchars($user['Nombre_R']); ?></p>
                                <p class="text-secondary mb-1"><?php echo htmlspecialchars($user['Direccion']); ?></p>
                                <p class="text-muted"><?php echo htmlspecialchars($user['Telefono']); ?></p>

                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="controlador.php?seccion=ADMI_Editar_A">Editar
                                                datos</a></li>
                                        <li><a class="dropdown-item"
                                                href="controlador.php?seccion=ADMI_CambiarPass">Cambiar Contraseña</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="controlador.php?seccion=ADMI_Ordenes">Ordenes</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="../Controladores/controlador_cerrar_session.php">Cerrar sesión</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="../Controladores/Controlador_EliminarCuenta_A.php"
                                                onclick="return confirmarEliminacion();">Eliminar Cuenta</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Nombre</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo htmlspecialchars($user['Nombre_R']); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Teléfono</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo htmlspecialchars($user['Telefono']); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6>Dirección</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo htmlspecialchars($user['Direccion']); ?>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                
    <script src="../JS/mensaje_confirmacion_cuenta.js"></script>
</body>

</html>