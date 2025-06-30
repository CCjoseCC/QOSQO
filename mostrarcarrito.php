<?php
include 'global/config.php';
include 'carrito.php';
include 'principal/cabecera.php';
?>
<br>

<div style="width: 100%; padding: 20px;">
    <h2 class="text-center mb-4" style="font-size: 2rem;">🛒 Su lista de compra</h2>

    <?php if(!empty($_SESSION['CARRITO'])) { ?>
        <div class="p-4 bg-white rounded shadow-sm" style="width: 95%; margin: auto;">
            <table class="table table-bordered table-hover text-center align-middle" style="font-size: 1.1rem;">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach($_SESSION['CARRITO'] as $indice => $producto) { ?>
                        <tr>
                            <td class="text-left"><?php echo $producto['NOMBRE'] ?></td>
                            <td><?php echo $producto['CANTIDAD'] ?></td>
                            <td>$<?php echo number_format($producto['PRECIO'], 2) ?></td>
                            <td>$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2); ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                                    <button class="btn btn-danger btn-sm" type="submit" name="btnAccion" value="Eliminar">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php $total += ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
                    <?php } ?>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total:</strong></td>
                        <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <form action="pagar.php" method="post" class="p-4 bg-light border rounded">
                                <div class="form-group">
                                    <label for="email"><strong>Correo del contacto:</strong></label>
                                    <input id="email" name="email" class="form-control form-control-lg" type="email" placeholder="correo@ejemplo.com" required>
                                    <small class="form-text text-muted">
                                        Se usará para confirmar su pedido.
                                    </small>
                                </div>
                                <button class="btn btn-lg btn-block mt-3 text-white" style="background-color: #F47C20;" type="submit" name="btnAccion" value="proceder">
                                    Pagar
                                </button>
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="alert alert-info text-center">
            No hay productos en el carrito...
        </div>
    <?php } ?>
</div>

<?php include 'principal/pie.php'; ?>


