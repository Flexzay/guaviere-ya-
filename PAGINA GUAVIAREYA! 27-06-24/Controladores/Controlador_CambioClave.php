<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['correo']) || empty($_SESSION['correo'])) {
    header("location: ../Controladores/controlador.php?seccion=login");
    exit();
}

include '../Modelos/DataUser.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $required_fields = ['ContrasenaAnterior', 'NuevaContrasena', 'ConfirmarContrasena'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            header("location: ../Controladores/controlador.php?seccion=Cambiar_clave&error=1");
            exit();
        }
    }

    $email = $_SESSION['correo'];
    $contrasenaAnterior = $_POST['ContrasenaAnterior'];
    $nuevaContrasena = $_POST['NuevaContrasena'];
    $confirmarContrasena = $_POST['ConfirmarContrasena'];

    if ($nuevaContrasena !== $confirmarContrasena) {
        header("location: ../Controladores/controlador.php?seccion=Cambiar_clave&error=2");
        exit();
    }

    $usuario = DataUser::getUserByEmail($email);

    if (!$usuario) {
        header("location: ../Controladores/controlador.php?seccion=Cambiar_clave&error=2");
        exit();
    }

    if ($contrasenaAnterior !== $usuario['Contrasena']) {
        header("location: ../Controladores/controlador.php?seccion=Cambiar_clave&error=3");
        exit();
    }

    $success = DataUser::updatePassword($email, $nuevaContrasena);

    if ($success) {
        header("location: controlador.php?seccion=perfil");
        exit();
    } else {
        echo "Error al actualizar la contraseña.";
    }
} else {
    header("location: ../Controladores/controlador.php?seccion=Cambiar_clave&error=3");
    exit();
}
?>
