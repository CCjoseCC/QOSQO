<?php
include '../global/config.php';
include '../global/conexion.php';
include '../carrito.php';
include '../principal/cabecera.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Ropa</title>
    <link rel="stylesheet" href="stylei.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Matemasie&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zapatos Qosqo - Home</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/860/860895.png" type="image/x-icon">
 
</head>

     <!-- Cuerpo -->
    <main>
        <section class="IniciarSeccion">
            <div class="caja">
                <form action="../php/login.php" method="POST" class="iniciar">
                    <h1 class="titulo">INICIAR SESIÓN</h1>


                    <div class="entra"> 
                       <input type="text"  name="nombre_user" placeholder="Nombre de usuario" required>
                    </div>


                    <div class="entra">
                        <input type="password"  name="contrasena_user" placeholder="Contraseña" required>
                    </div>

<!--boton iniciar sesión-->
                        <button  type="submit" class="btn-iniciar" name="login">Iniciar sesión</button>
                        
<!--boton registrarse-->
                    <p class="registar">¿No tienes una cuenta? <a href="../Registrarse/registrarse.php" class="link">Regístrate aquí</a></p>




                </form>
            </div>
          
        </section>
    </main>
     <!-- Pie de página -->
    <footer>

    </footer>
    <script src="ja.js"></script>
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>