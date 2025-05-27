<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'principal/cabecera.php';
?>

<br>

<?php 
$total = 0;
if($_POST){
    $SID = session_id();
    $Correo = $_POST['email'];

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total += $producto['PRECIO'] * $producto['CANTIDAD'];
    }

    $sentencia = $pdo->prepare("INSERT INTO `ventas` 
        (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
        VALUES (NULL,:ClaveTransaccion,'',NOW(),:Correo,:Total, 'pendiente');");

    $sentencia->bindParam(":ClaveTransaccion",$SID);
    $sentencia->bindParam(":Correo",$Correo);
    $sentencia->bindParam(":Total",$total);
    $sentencia->execute();

    $idVenta = $pdo->lastInsertId();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $sentencia = $pdo->prepare("INSERT INTO `detalleventa` 
            (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) 
            VALUES (NULL,:IDVENTA,:IDPRODUCTO,:PRECIOUNITARIO,:CANTIDAD, '0');"); 

        $sentencia->bindParam(":IDVENTA",$idVenta);
        $sentencia->bindParam(":IDPRODUCTO",$producto['ID']);
        $sentencia->bindParam(":PRECIOUNITARIO",$producto['PRECIO']);
        $sentencia->bindParam(":CANTIDAD",$producto['CANTIDAD']);

        $sentencia->execute();
    }
}
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0" style="max-width: 700px; width: 100%;">
        <div class="card-header text-white text-center" style="background-color: #F47C20;">
            <h2 class="mb-0">Último Paso</h2>
        </div>
        <div class="card-body text-center">
            <p class="lead">Estás por pagar con <strong>PayPal</strong>.</p>
            <h3 class="display-4" style="color: #F47C20;">Total: <strong>S/. <?php echo number_format($total, 2); ?></strong></h3>
            <hr>
            <p class="mb-4 text-muted">Una vez validado el pago, podrás descargar tus productos digitales.</p>
            <div id="paypal-button"></div>
            </a>
        </div>
    </div>
</div>

<!-- Botón de PayPal con checkout.js (modo sandbox) -->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<div id="paypal-button"></div>

<script>
    paypal.Button.render({
        env: 'sandbox', // Cambia a 'production' para producción

        client: {
            sandbox: 'AciyxfgKpL2wqkOJrYIxx-TElzE2AOKGrcRwFgKOpgN9UbJwpkyVfAUV_K-Cl3d6M_uVOJ84e-ECphUL', // Reemplaza con tu client ID de sandbox real
            production: 'AThC58WsxasWz37HJs10rvYJXEj0OlZa2iS21be_0XHKSkGinatdwT8GFH7rFhjdlLYPFY-76xHqlLva' // Solo si vas a producción
        },

        locale: 'es_ES',
        style: {
            size: 'responsive',
            color: 'gold',
            shape: 'pill',
        },
  //nuevo
        payment: function (data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: { total: '<?php echo $total?>', currency: 'USD'},
                    description:"Compra de productos a develoteca:$<?php echo number_format($total,2);?>",
                    custom:"<?php echo $SID;?>#<?php echo openssl_encrypt($idVenta,COD,KEY); ?>"
                }
            ]
            });
        },
  //nuevo
        onAuthorize: function (data, actions) {
    return actions.payment.execute().then(function () {
        console.log(data);
        window.location="verificador.php?paymentToken=" +data.paymentToken+"&paymentID="+data.paymentID;
        
    });
}

      
    }, '#paypal-button');
</script>










<?php include 'principal/pie.php'; ?>
