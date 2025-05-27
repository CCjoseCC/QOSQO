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
    <link rel="stylesheet" href="styler.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Matemasie&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Ropa</title>
    
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
<body>
    
     <!-- Cuerpo -->
     <main>
        
        <section class="IniciarSeccion">
            <div class="caja">
                <form action="../php/registro.php" method="POST" class="registrarse" >
                    <h1 class="titulo">REGISTRARSE</h1>

                         <!-------- Entrada  de informacion ------->
                    <div class="entra">
                        <input type="text" name="nombre_user" placeholder="Nombre de usuario" required>
                    </div>


                    <div class="entra">
                        <input type="text" name="nom_user" placeholder="Nombre y Apellido" required>
                    </div>

                    
                    <div class="entra">
                        <input type="email"  name="correo_user" placeholder="Correo electronico" required>
                    </div>


                    <div class="entra">
                        <input type="password" name="contrasena_user" placeholder="Contraseña" required>
                    </div>
     <!-- fin -->

     <!-- botones -->
                    <button type="submit" class="btn-registrar" name="registro">Registrar</button>

                    <p class="registrar">¿Ya tienes una cuenta? <a href="../IniciarSeccion/iniciar.php" class="link">Inicia sesión aquí</a></p>
                    
                   </form>
            </div>
          
        </section>
    </main>
     <!-- Pie de página -->
    <footer>

    </footer>
    <script src="regjav.js"></script>
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>