
<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: /JoaquinPomayay/index.php");
    exit();
}

$nombre_completo = $_SESSION['nombre_completo'];
$usuario = $_SESSION['nombre_user'];
$correo = $_SESSION['correo_user'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="mb-4">Bienvenido, <?php echo htmlspecialchars($nombre_completo); ?> 👋</h2>
            <p><strong>Nombre de usuario:</strong> <?php echo htmlspecialchars($usuario); ?></p>
            <p><strong>Correo electrónico:</strong> <?php echo htmlspecialchars($correo); ?></p>
            <button onclick="window.history.back()" class="btn btn-secondary">← Atrás</button>
            <a href="logout.php" class="btn btn-danger mt-4">Cerrar sesión</a>
        </div>
    </div>
</body>
</html>
