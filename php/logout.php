<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
session_unset();
session_destroy();

header("Location: ../index.php");
exit();
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cerrando sesión...</title>
  <meta http-equiv="refresh" content="2;url=../index.php">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      height: 100vh;
      align-items: center;
      justify-content: center;
    }
    .message-box {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="message-box">
    <h2>Sesión cerrada correctamente</h2>
    <p>Redirigiendo al inicio de sesión...</p>
    <div class="spinner-border text-primary mt-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</body>
</html>
