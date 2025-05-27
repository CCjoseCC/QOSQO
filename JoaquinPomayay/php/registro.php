<?php
require 'conexion1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['nombre_user'];
    $contrasena = $_POST['contrasena_user'];
    $correo = $_POST['correo_user'];
    $nombre_completo = trim($_POST['nom_user']); // ahora aquí va nombre y apellido juntos

    // Validación básica
    if (empty($usuario) || empty($contrasena) || empty($correo) || empty($nombre_completo)) {
        header("Location:../Registrarse/registrarse.php?error=campos_vacios");
        exit();
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        header("Location:../Registrarse/registrarse.php?error=correo_invalido");
        exit();
    }

    // Verificar si el usuario o correo ya existen
    $stmt_check = $conexion1->prepare("SELECT id_user FROM usuarios WHERE nombre_user = ? OR correo_user = ?");
    $stmt_check->bind_param("ss", $usuario, $correo);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        header("Location:../Registrarse/registrarse.php?error=usuario_existe");
        $stmt_check->close();
        exit();
    }
    $stmt_check->close();

    // Hashear la contraseña
    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar el usuario
    $stmt = $conexion1->prepare("INSERT INTO usuarios (nombre_user, contrasena_user, correo_user, nombre_completo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $usuario, $hashed_password, $correo, $nombre_completo);

    if ($stmt->execute()) {
        header("Location:../IniciarSeccion/iniciar.php?registro=exitoso");
        exit();
    } else {
        header("Location:../Registrarse/registrarse.php?error=insercion_fallida");
        exit();
    }

    $stmt->close();
}

$conexion1->close();
?>

