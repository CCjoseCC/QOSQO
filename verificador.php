<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'principal/cabecera.php';
?>

<style>
    .mensaje-paypal {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
        font-family: Arial, sans-serif;
    }

    .cuadro {
        background-color: #f9f9f9;
        border: 2px solid #ddd;
        border-radius: 15px;
        padding: 40px;
        max-width: 500px;
        width: 100%;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .cuadro h3 {
        margin-bottom: 10px;
        font-size: 26px;
    }

    .cuadro.aprobado {
        border-color: #4CAF50;
        color: #4CAF50;
    }

    .cuadro.rechazado {
        border-color: #F44336;
        color: #F44336;
    }
</style>

<?php
$ClienteID = "AciyxfgKpL2wqkOJrYIxx-TElzE2AOKGrcRwFgKOpgN9UbJwpkyVfAUV_K-Cl3d6M_uVOJ84e-ECphUL";
$Secret = "EL-bbfRSCS5iPz-pdL046ow-A4QxynFB4568CnGll5r0xM_Mjzz3eqPVTnh1KE-j4EY1KpFEvXMukAeh";

// Obtener token
$Login = curl_init("https://api.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($Login, CURLOPT_RETURNTRANSFER, true);
curl_setopt($Login, CURLOPT_USERPWD, $ClienteID . ":" . $Secret);
curl_setopt($Login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

$Respuesta = curl_exec($Login);
curl_close($Login);

$objRespuesta = json_decode($Respuesta);
$AccessToken = $objRespuesta->access_token;

// Obtener detalles del pago
$venta = curl_init("https://api-m.sandbox.paypal.com/v1/payments/payment/" . $_GET['paymentID']);
curl_setopt($venta, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer " . $AccessToken
]);
curl_setopt($venta, CURLOPT_RETURNTRANSFER, true);

$RespuestaVenta = curl_exec($venta);
curl_close($venta);

$objDatosTransaccion = json_decode($RespuestaVenta);

$state = $objDatosTransaccion->state;
$email = $objDatosTransaccion->payer->payer_info->email;
$total = $objDatosTransaccion->transactions[0]->amount->total;
$currency = $objDatosTransaccion->transactions[0]->amount->currency;
$custom = $objDatosTransaccion->transactions[0]->custom;

$clave = explode("#", $custom);
$SID = $clave[0];
$claveVenta = openssl_decrypt($clave[1], COD, KEY);
?>

<div class="mensaje-paypal">
    <div class="cuadro <?php echo $state == 'approved' ? 'aprobado' : 'rechazado'; ?>">
        <?php if ($state == "approved") : ?>
            <h3>✅ ¡Pago Aprobado!</h3>
            <p>Gracias por tu compra.<br>Hemos recibido tu pago correctamente.</p>

            <?php
            // Actualizar base de datos
            $sentencia = $pdo->prepare("UPDATE ventas 
                SET PaypalDatos = :PaypalDatos, status = 'aprobado' 
                WHERE ID = :ID");
            $sentencia->bindParam(":ID", $claveVenta);
            $sentencia->bindParam(":PaypalDatos", $RespuestaVenta);
            $sentencia->execute();

            $sentencia = $pdo->prepare("UPDATE ventas 
                SET status = 'completo' 
                WHERE ClaveTransaccion = :ClaveTransaccion 
                AND Total = :TOTAL 
                AND ID = :ID");
            $sentencia->bindParam(":ClaveTransaccion", $SID);
            $sentencia->bindParam(":TOTAL", $total);
            $sentencia->bindParam(":ID", $claveVenta);
            $sentencia->execute();

            // 🔽 DESCONTAR STOCK DE LA TABLA productos
            foreach ($_SESSION['CARRITO'] as $producto) {
                $id_producto = $producto['ID'];
                $cantidad_comprada = $producto['CANTIDAD'];

                $sentencia = $pdo->prepare("UPDATE producto SET Stock = Stock - :cantidad WHERE id = :id");
                $sentencia->bindParam(':cantidad', $cantidad_comprada);
                $sentencia->bindParam(':id', $id_producto);
                $sentencia->execute();
            }

            // 🔄 LIMPIAR CARRITO DESPUÉS DE LA COMPRA
            unset($_SESSION['CARRITO']);
            ?>
        <?php else : ?>
            <h3>❌ Pago No Aprobado</h3>
            <p>Tu pago no se pudo completar.<br>Por favor, intenta nuevamente.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'principal/pie.php'; ?>
