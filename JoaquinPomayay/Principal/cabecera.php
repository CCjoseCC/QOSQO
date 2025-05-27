<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  ...


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapatos Qosqo - Zapatos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/estilos.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/860/860895.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>


<body>

    <header class="header">
        <nav class="nav-links" id="nav-links">
            <a href="/JoaquinPomayay/pages/zapatos.php">ZAPATOS</a>
            <a href="/JoaquinPomayay/pages/mocasines.php">MOCASINES</a>
            <a href="/JoaquinPomayay/pages/zapatillas.php">ZAPATILLAS</a>
            <a href="/JoaquinPomayay/pages/tacones.php">TACONES</a>
            <a href="/JoaquinPomayay/index.php" class="seguimiento">HOME</a>
            <a href="/JoaquinPomayay/pages/tacones.php">TACONES</a>
        </nav>
        <div class="logo">
           <img src="/JoaquinPomayay/img/logo.webp" alt="logo">
        </div>
        <div class="icons">
            <a href="#"><span class="material-icons">search</span> BUSCAR</a>


<!--boton de iniciar esconder cerrar sesion-->    




<?php if (isset($_SESSION['usuario_id'])): ?>

<!-- Si el usuario está logueado -->
    <a href="/JoaquinPomayay/php/cuenta.php"><span class="material-icons">person</span>Mi cuenta</a>
    <a href="/JoaquinPomayay/php/logout.php"><span class="material-icons">person</span>Cerrar sesión</a>
<?php else: ?>
    <!-- Si el usuario NO está logueado -->
    <a href="/JoaquinPomayay/IniciarSeccion/iniciar.php"><span class="material-icons">person</span>ACCEDER</a>
<?php endif; ?>


<!--fin-->

            <div class="alert alert-success">
              
                 <div class="cart-icon">
                <a href="/JoaquinPomayay/mostrarcarrito.php"><span class="material-icons">shopping_cart</span> CARRITO(<?php 
                    echo(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                
                ?>)</a>
                </div>
            </div>
            
        </div>
        <button id="menu-toggle" class="menu-toggle">☰</button> 
    </header>