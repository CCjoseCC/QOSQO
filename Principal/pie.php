   
   
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapatos Qosqo - Zapatos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/860/860895.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

   
   <footer class="footer">
        <div class="footer-content">
            <div class="footer-section logo-social">
                <img src="../img/logo.webp" alt="logo" class="footer-logo">
                <div class="social-icons">
                    <a href="#"><img width="25" height="25" src="https://img.icons8.com/ios/50/instagram-new--v1.png"
                            alt="instagram-new--v1" /></a>
                    <a href="#"><img width="25" height="25" src="https://img.icons8.com/ios/50/facebook-new.png"
                            alt="facebook-new" /></a>
                    <a href="#"><img width="25" height="25" src="https://img.icons8.com/ios/50/tiktok--v1.png"
                            alt="tiktok--v1" /></a>
                </div>
                <hr>
                <p>Av Prolongación Arica 2248<br>Cercado de Lima<br>(01) 619-3637<br>Qosqo.palacio@alirmail.com</p>
            </div>
            <div class="footer-section">
                <h3>Qosqo</h3>
                <ul>
                    <li><a href="#">¿Quiénes Somos?</a></li>
                    <li><a href="#">Venta por catálogo</a></li>
                    <li><a href="#">Ventas por mayor</a></li>
                    <li><a href="#">Facturas electrónicas</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Te ayudamos</h3>
                <ul>
                    <li><a href="#">Nuestras tiendas</a></li>
                    <li><a href="#">Preguntas frecuentes</a></li>
                    <li><a href="#">Contáctanos</a></li>
                    <li><a href="#">Libro de reclamaciones</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Entregas</h3>
                <ul>
                    <li><a href="#">Términos y condiciones</a></li>
                    <li><a href="#">Política de datos</a></li>
                    <li><a href="#">Política de cookies</a></li>
                    <li><a href="#">Cambios y devoluciones</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Medios de pago</h3>
                <div class="payment-methods">
                    <img src="/JoaquinPomayay/img/metodospago.png" alt="Medios de Pago" class="payment-logo">
                    <img src="/JoaquinPomayay/img/metodospago2.webp" alt="Medios de Pago" class="payment-logo">
                </div>
                <a href="#"><img src="/JoaquinPomayay/img/libroreclamaciones.png" alt="Libro de reclamaciones"
                        class="reclamaciones-icon"></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 - Qosqo Perú - Derechos reservados</p>
        </div>
    </footer>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-button" id="close-modal">&times;</span>
            <p id="modal-message">Producto agregado al carrito</p>
        </div>
    </div>

    <div id="cart-sidebar" class="cart-sidebar">
        <button id="cart-close-button" class="cart-close-button">✖</button>
        <h2>Carrito de Compras</h2>
        <ul id="cart-items"></ul>
        <p id="cart-total">Total: $0.00</p>
        <button id="checkout-button">Pagar</button>
      </div>
      <div id="overlay" class="overlay"></div>



</body>

</html>