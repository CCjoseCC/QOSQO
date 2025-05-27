<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('conexion1.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $usuario = $_POST['nombre_user'];
    $contrasena = $_POST['contrasena_user'];

    // También traemos el rol
    $stmt = $conexion1->prepare("SELECT id_user, nombre_user, contrasena_user, correo_user, nombre_completo, rol FROM usuarios WHERE nombre_user = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $db_usuario, $db_contrasena, $db_correo, $db_nombre_completo, $db_rol);
        $stmt->fetch();

        if (password_verify($contrasena, $db_contrasena)) {
            // Guardamos todo en la sesión, incluido el rol
            $_SESSION['usuario_id'] = $user_id;
            $_SESSION['nombre_user'] = $db_usuario;
            $_SESSION['correo_user'] = $db_correo;
            $_SESSION['nombre_completo'] = $db_nombre_completo;
            $_SESSION['rol'] = $db_rol;

            // Puedes redirigir a diferentes páginas según el rol
            if ($db_rol === 'admin') {
                header("Location: ../admin_panel.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        } else {
            $error_login = "Contraseña incorrecta.";
        }
    } else {
        $error_login = "Usuario no encontrado.";
    }

    $stmt->close();
}

$conexion1->close();
?>
